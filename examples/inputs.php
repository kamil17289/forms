<?php

include '../vendor/autoload.php';

use Nethead\Forms\Controls\Button as ControlButton;
use Nethead\Forms\Inputs\BooleanCheckbox;
use Nethead\Forms\Inputs\DateTimeLocal;
use Nethead\Forms\Inputs\Checkbox;
use Nethead\Forms\Inputs\DataList;
use Nethead\Forms\Inputs\Floating;
use Nethead\Forms\Inputs\Password;
use Nethead\Forms\Inputs\TextArea;
use Nethead\Forms\Inputs\Integer;
use Nethead\Forms\Inputs\Button;
use Nethead\Forms\Inputs\Hidden;
use Nethead\Forms\Inputs\Number;
use Nethead\Forms\Inputs\Search;
use Nethead\Forms\Inputs\Submit;
use Nethead\Forms\Inputs\Select;
use Nethead\Forms\Inputs\Color;
use Nethead\Forms\Inputs\Radio;
use Nethead\Forms\Inputs\Email;
use Nethead\Forms\Inputs\Month;
use Nethead\Forms\Inputs\Reset;
use Nethead\Forms\Inputs\Range;
use Nethead\Forms\Inputs\Time;
use Nethead\Forms\Inputs\Date;
use Nethead\Forms\Inputs\File;
use Nethead\Forms\Inputs\Text;
use Nethead\Forms\Inputs\Week;
use Nethead\Forms\Inputs\Url;
use Nethead\Forms\Inputs\Tel;
use Nethead\Forms\Inputs\Id;

$text = new Text('first_name', '', '', 'Please enter your name');
$text->setNotice('Remember to fill in this field!');

$radio = new Radio('os', 'windows', 'linux', 'Windows');
$radio2 = new Radio('os', 'linux', 'linux', 'Linux');
$checkbox = new Checkbox('remember_me', true, true, 'Remember me');
$boolCheck = new BooleanCheckbox('auto_save', 1, 'Auto-save');
$color = new Color('background', '#00ffff', '#dedede', 'Select background color');
$dataList = new DataList('category', 'Programming', '', 'Category', [
    'Networking',
    'Programming',
    'SysAdmin'
]);
$button = new Button('cta_go', 'Check it out!');
$date = new Date('birthday', '', '', 'Date of birth');
$dateTimeLocal = new DateTimeLocal('event_date', '', '', 'Event start date');
$email = new Email('email_address', '', '', 'Your e-mail address');
$file = new File('thumbnail', 'Upload thumbnail');
$floating = new Floating('latitude', '', '', 'Latitude');
$integer = new Integer('age', null, 0, 'Age in years');
$hidden = new Hidden('csrf_token', 'asdasdsdfg34534cfssdgdsfgdsfg');
$id = new Id('uid', 34, 0, 'User ID');
$month = new Month('month', '', '', 'Month');
$number = new Number('amount', null, 24, 'Amount');
$password = new Password('Password', 'Your password');
$range = new Range('optimal_range', null, '', 'Range');
$reset = new Reset('reset', 'Reset Form');
$search = new Search('search_google', '', '', 'Search with Google');
$select = new Select('contanct_method', '', '', 'Contact method', [
    'telephone' => 'Phone',
    'email' => 'Email'
]);
$submit = new Submit('submit', 'Send form');
$tel = new Tel('phone_number', '', '', 'Contact phone');
$textArea = new TextArea('introduction','', '', 'Introduction text');
$time = new Time('alarm_set', '', '', 'Set alarm');
$url = new Url('service_url', '', '', 'Service URL');
$week = new Week('week', '', '', 'Week of the year');
$controlButton = new ControlButton('control', 'Save draft', 'button');

print $text->render();
print $range->render();
print $number->render();
print $floating->render();
print $integer->render();
print $radio->render();
print $radio2->render();
print $checkbox->render();
print $boolCheck->render();
print $color->render();
print $dataList->render();
print $button->render();
print $date->render();
print $dateTimeLocal->render();
print $email->render();
print $file->render();
print $hidden->render();
print $id->render();
print $month->render();
print $password->render();
print $reset->render();
print $search->render();
print $select->render();
print $submit->render();
print $tel->render();
print $textArea->render();
print $time->render();
print $url->render();
print $week->render();
print $controlButton->render();