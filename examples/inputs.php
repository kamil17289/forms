<?php

include '../vendor/autoload.php';

use Nethead\Forms\Controls\Button as ControlButton;
use Nethead\Forms\Mutators\Bootstrap4Mutator;
use Nethead\Forms\Renderers\MarkupRenderer;
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

$render = new MarkupRenderer(MarkupRenderer::MODE_FULL | MarkupRenderer::MODE_MUTATE);

$render->setMutator(new Bootstrap4Mutator());

print $render($text);
print $render($radio);
print $render($radio2);
print $render($checkbox);
print $render($boolCheck);
print $render($color);
print $render($dataList);
print $render($button);
print $render($date);
print $render($dateTimeLocal);
print $render($email);
print $render($file);
print $render($floating);
print $render($integer);
print $render($hidden);
print $render($id);
print $render($month);
print $render($number);
print $render($password);
print $render($range);
print $render($reset);
print $render($search);
print $render($select);
print $render($submit);
print $render($tel);
print $render($textArea);
print $render($time);
print $render($url);
print $render($week);
print $render($controlButton);
