/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

import javax.microedition.midlet.*;

/**
 * @author Kruser
 */
public class Midlet extends MIDlet {

    private WorkSpace workSpace;

    public void startApp() {
        if (workSpace == null) {
            workSpace = new WorkSpace();
            workSpace.init(this);
        }
    }

    public void pauseApp() {
    }

    public void destroyApp(boolean unconditional) {
    }
}
