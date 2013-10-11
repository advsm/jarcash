
{foreach $faq element}
<h3>{$element->getQuestion()}</h3>
<p>{$element->getAnswer()}</p> 
{/foreach}