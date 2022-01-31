<?php

include '../vendor/autoload.php';

use Nethead\Forms\Mutators\Bootstrap4Mutator;
use Nethead\Forms\Renderers\MarkupRenderer;
use Nethead\Forms\Forms\ExampleLoginForm;

$renderer = new MarkupRenderer(MarkupRenderer::MODE_FULL | MarkupRenderer::MODE_MUTATE);
$bootstrap = new Bootstrap4Mutator();
$renderer->setMutator($bootstrap);
$renderer->setRenderer('wrapper', [$bootstrap, 'wrapper_element']);

$form = new ExampleLoginForm();
$form->registerRenderer($renderer);

print $form->open();

print $form->render('_token');
print $form->render('username');
print $form->render('password');
print $form->render('remember_me');
print $form->render('submit');
print $form->render('reset');

print $form->close();