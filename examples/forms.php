<?php

include '../vendor/autoload.php';

use Nethead\Forms\Forms\ExampleLoginForm;
use Nethead\Forms\Renderers\Wrapper;

Wrapper::extend([
    'attrs' => ['class' => 'form-group']
]);

$form = new ExampleLoginForm();

print $form->open();

print $form->render('_token');
print $form->render('username', ['input' => ['autofocus' => true]]);
print $form->render('password');
print $form->render('remember_me');
print $form->render('ui_1');
print $form->render('ui_2');
print $form->render('submit');
print $form->render('reset');

print $form->close();