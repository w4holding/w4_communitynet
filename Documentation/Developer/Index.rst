.. include:: /Includes.rst.txt
.. highlight:: php

.. _developer:

================
Developer corner
================



How to add a layout
===================

A layout can be added via TSConfig:

.. code-block:: typoscript

   TCEFORM {
       sys_template {
           tx_w4communitynet_layout {
               addItems {
                   your_extension/Configuration/TypoScript/MyLayout = LLL:EXT:your_extension/Resources/Private/Language/locallang_be.xlf:sys_template.tx_w4communitynet_layout.my_template
                   your_extension/Configuration/TypoScript/MyLayout.icon = EXT:your_extension/Resources/Public/Images/layout.png
               }
           }
       }
   }

The icon for the layout has to have the dimensions 75x55 px.

your_extension/Configuration/TypoScript/MyLayout is the path where the setup, constants and TSConfig files for the layout are located. The folder MyLayout has to have the subfolders:

Constants (files with the extension .typoscript)
Setup (files with the extension .typoscript)
TSConfig (files with the extension .tsconfig)

For instance, a setup.typoscript file in the folder your_extension/Configuration/TypoScript/MyLayout/Setup could be something like:

.. code-block:: typoscript

   page {
       includeCSS {
           100 = your_extension/Resources/Public/MyLayout/Css/vendor.min.css
           105 = your_extension/Resources/Public/MyLayout/JavaScript/lightbox/css/lightbox.min.css
           110 = your_extension/Resources/Public/MyLayout/Css/style.min.css
           font_awesome = your_extension/Resources/Public/MyLayout/assets/plugins/font-awesome/css/font-awesome.css
       }
       includeJSFooter {
           10  = your_extension/Resources/Public/MyLayout/JavaScript/jquery-3.6.0.min.js
           20  = your_extension/Resources/Public/MyLayout/JavaScript/bootstrap/bootstrap.bundle.min.js
           30  = your_extension/Resources/Public/MyLayout/JavaScript/lightbox/js/lightbox.js
           40  = your_extension/Resources/Public/MyLayout/JavaScript/datatables.min.js
           100 = your_extension/Resources/Public/MyLayout/JavaScript/main.js
       }
       10 {
           layoutRootPaths.30 = your_extension/Resources/Private/MyLayout/Layouts/Page
           templateRootPaths.30 = your_extension/Resources/Private/MyLayout/Templates/Page
           partialRootPaths.30 = your_extension/Resources/Private/MyLayout/Partials/Page
       }
   }
