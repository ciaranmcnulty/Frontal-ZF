Frontal ZF View Helper
----------------------

This is a utility class for using [frontal][frn-git] in a Zend Framework 1.x project's templates.

Currently this only supports frontal's ->location() method, which allows a template to override the routed URL in favour of a different one - this is useful when functionality needs to be shared betwen different pages in a ZF project without adding all of the different routes to the Frontal JS.

    [frn-git]: https://github.com/carlmw/frontal

Installation
============

1. Add to a suitable location in the project (e.g. /vendor/library/ZF-Frontal).
2. Add the route to your project's application.ini:

    resources.view.helperPath.Frn_View_Helper = APPLICATION_PATH "/../library/ZF-Frontal/View/Helper"

Simple Usage
============

Override the location inside a view script, all in one go:

    <?= $this->frontal()->location('/foo/bar') ?>

Advanced Usage
==============

This mode will be more useful in future when more of frontal's options are supported and it makes sense to set multiple properties and output them all at the end.

Override the location without outputting the markup:

    <? $this->frontal()->location('/foo/bar') ?>

Output the markup separately (perhaps in a Layout):

    <?= $this->frontal() ?>

