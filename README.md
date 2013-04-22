Frontal ZF View Helper
----------------------

This is a utility class for using Frontal (https://github.com/carlmw/frontal) in a Zend Framework 1.x project's templates.

Installation
------------

1. Add to a suitable location in the project (e.g. /vendor/library/ZF-Frontal).
2. Add the route to your project's application.ini:

    resources.view.helperPath.Frn_View_Helper = APPLICATION_PATH "/../library/ZF-Frontal/Frn/View/Helper"

Usage
-----

All usage requires the frontal markup to be echoed near the end of the page, ideally just before the closing BODY tag.

    <?= $this->frontal() ?>

It makes sense to do this in your Layout if you are using one.

Passing data to Frontal
=======================

To pass data to Frontal from a view script:

    <? $this->frontal->data($key, $value) ?>
    
Where $key is a string and $value is arbitrary data. Note that $value will be JSON encoded. 

Overriding the Frontal location
================================

This can be used to override the URL frontal uses for its routing, i.e. to make multiple pages match the same Frontal rules without adding lots of matching routes to the Frontal config.

    <? $this->frontal()->location('/foo/bar') ?>
