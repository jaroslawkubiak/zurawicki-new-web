<?php
// ################## pokazuje blad zapytania 
function show_mysqli_query($conn, $query)
{
	//do funkcji musi trafic samo zapytanie
	$result = mysqli_query($conn, $query);

	if (!$result) echo '<div><font color="red">' . mysqli_error($conn) . ' : </font><font color="blue">' . $query . '</font></div>';
	// else echo'<div><font color="blue">OK : </font><font color="blue">'.$query.'</font></div>';
}

function drawInput($index, $name, $label, $span, $value, $disabled)
{
	$required = '';
	if ($name == 'email') $required = ' required';
	echo '<div class="form-row">';
	echo '<span class="form-num-field">' . $index . '</span>';
	echo '<label for="' . $name . '" class="form-text-label">' . $label;
	echo '<span class="form-additional-info">' . $span . '</span></label>';
	echo '<input id="' . $name . '" autocomplete="off" type="text" value="' . $value . '" name="' . $name . '" title="' . $label . '" ' . $disabled . ' ' . $required . ' class="form--grid-2-cols"/>';
	echo '</div>';
}

function drawCheckboxSelect($index, $ilosc, $name, $label, $width, $disabled)
{
	$checked = '';
	if ($ilosc != 0) $checked = " checked";
	echo '<li class="list-row">';
	echo '<div class="list-check-wrapper ' . $width . '">';
	echo '<input id="opcja-' . $index . '" type="checkbox" ' . $checked . ' name="' . $name . '" ' . $disabled . ' title="' . $label . '"/>';
	echo '<label class="form-list-label" for="opcja-' . $index . '" title="' . $label . '" ' . $disabled . '>' . $label . '</label>';
	echo '</div>';
	echo '<select id="opcja-' . $index . '_ilosc" name="ilosc_' . $name . '" ' . $disabled . ' title="Wybierz ilość">';
	echo '<label class="hidden" for="opcja-' . $index . '_ilosc">ilość</label>';
	echo '<option value="0">0</option>';
	for ($x = 1; $x <= 5; $x++) {
		if ($ilosc == $x) echo '<option value="' . $x . '" selected="selected">' . $x . '</option>';
		else echo '<option value="' . $x . '">' . $x . '</option>';
	}
	echo '</select>';
	echo '</li>';
}

function drawCheckbox($typ, $index, $value, $name, $label, $disabled)
{
	$checked = '';
	if ($value == 'on') $checked = ' checked';
	echo '<li class="list-row styl_dodatki">';
	echo '<div class="list-check-wrapper">';
	echo '<input id="' . $typ . '-opcja-' . $index . '" type="checkbox" ' . $checked . ' ' . $disabled . ' name="' . $name . '" title="' . $label . '" />';
	echo '<label class="form-list-label" for="' . $typ . '-opcja-' . $index . '" ' . $disabled . ' title="' . $label . '">' . $label . '</label>';
	echo '</div>';
	echo '</li>';
}

function drawCheckboxKuchnia($index, $value, $name, $label, $dodatek_checkbox, $dodatek_text, $row, $disabled)
{
	if (!$label) {
		echo '<li class="list-row"></li>';
	} else {
		$kuchnia_dodatki_checkbox = ['Montowany pod płytą', 'Montowany w słupku'];

		$checked = '';
		if ($value == 'on') $checked = ' checked';

		$cursorDefault = ' ';
		$inputDisabled = ' ';
		if ($disabled != '') {
			$cursorDefault = ' cursor: default;';
			$inputDisabled = ' disabled';
		}

		$dataSet = '';
		$classList = '';
		$dataSetInput = '';
		if ($dodatek_checkbox) {
			$dataSet = 'data-dodatki';
			$classList = ' kuchnia-dodatki-ramka';
		}
		if ($dodatek_text) {
			$dataSet = 'data-' . $name;
			$dataSetInput = 'data-dodatek-text-input';
			$classList = ' kuchnia-dodatki-ramka';
		}
		echo '<li class="list-row kuchnia-dodatki ' . $classList . '">';
		echo '<div class="list-check-wrapper">';
		echo '<input id="kuchnia-opcja-' . $index . '" type="checkbox" ' . $disabled . ' ' . $checked . ' ' . $dataSet . ' name="' . $name . '" title="' . $label . '"/>';
		echo '<label class="form-list-label" for="kuchnia-opcja-' . $index . '" ' . $disabled . ' title="' . $label . '">' . $label . '</label>';
		echo '</div>';

		if ($dodatek_checkbox) {
			$name_dodatek_0 = $name . '_plyta';
			$name_dodatek_1 = $name . '_slupek';
			$dodatek_1_checked = '';
			$dodatek_2_checked = '';
			if ($row[$name_dodatek_0] == 'on') $dodatek_1_checked = ' checked';
			if ($row[$name_dodatek_1] == 'on') $dodatek_2_checked = ' checked';
			echo '<div class="kuchnia-dodatki-wrapper">';
			echo '<input id="opcja-' . $index . '-dodatek-1" type="checkbox" ' . $inputDisabled . ' ' . $dodatek_1_checked . ' name="' . $name_dodatek_0 . '" style="' . $cursorDefault . '" class="kuchnia-dodatek-checkbox" title="' . $kuchnia_dodatki_checkbox[0] . '"/>';
			echo '<label class="form-list-label" for="opcja-' . $index . '-dodatek-1" style="' . $cursorDefault . '"  title="' . $kuchnia_dodatki_checkbox[0] . '">' . $kuchnia_dodatki_checkbox[0] . '</label>';
			echo '<input id="opcja-' . $index . '-dodatek-2" type="checkbox" ' . $inputDisabled . ' ' . $dodatek_2_checked . ' name="' . $name_dodatek_1 . '"  style="' . $cursorDefault . '" class="kuchnia-dodatek-checkbox" title="' . $kuchnia_dodatki_checkbox[1] . '"/>';
			echo '<label class="form-list-label" for="opcja-' . $index . '-dodatek-2" style="' . $cursorDefault . '" title="' . $kuchnia_dodatki_checkbox[1] . '">' . $kuchnia_dodatki_checkbox[1] . '</label>';
			echo '</div>';
		}
		if ($dodatek_text) {
			$name_dodatek = $name . '_szerokosc';
			echo '<div class="kuchnia-dodatki-wrapper-input">';
			echo '<label for="' . $name_dodatek . '" class="kuchnia-dodatek-input-label" style="' . $cursorDefault . '" title="' . $dodatek_text . '">' . $dodatek_text . '</label>';
			echo '<input id="' . $name_dodatek . '" ' . $dataSetInput . ' ' . $inputDisabled . ' autocomplete="off" type="text" value="' . $row[$name_dodatek] . '" name="' . $name_dodatek . '" class="form--grid-2-cols kuchnia-dodatek-input" style="' . $cursorDefault . '" title="' . $dodatek_text . '"/>';
			echo '</div>';
		}
		echo '</li>';
	}
}

function drawTextarea($index, $name, $label, $span, $value, $height, $disabled)
{
	echo '<div class="form-row">';
	echo '<span class="form-num-field">' . $index . '</span>';
	echo '<label for="' . $name . '" class="form-text-label">' . $label;
	echo '<span class="form-additional-info">' . $span . '</span></label>';
	echo '<textarea id="' . $name . '" name="' . $name . '" ' . $disabled . ' class="form--grid-2-cols textarea ' . $height . '" title="' . $label . '"/>';
	echo $value;
	echo '</textarea>';
	echo '</div>';
}

function drawSubTextarea($name, $label, $value, $disabled)
{
	echo '<div class="form-row" style="border: none;">';
	echo '<label for="' . $name . '" class="form-text-label form--grid-2-cols">' . $label . '</label>';
	echo '<textarea id="' . $name . '" name="' . $name . '" ' . $disabled . ' class="form--grid-2-cols textarea" title="' . $label . '"/>';
	echo $value;
	echo '</textarea>';
	echo '</div>';
}

function btnWstecz($etap, $ankietaID)
{
	$wstecz = $etap - 1;
	echo '<a href="index.php?etap=' . $wstecz . '&ankietaID=' . $ankietaID . '&submit=Dalej&wstecz=true">';
	echo '<input type="button" value="Wstecz" name="wstecz" title="Wstecz" />';
	echo '</a>';
}

function generateHash($length = 20, $numbers = true, $lower_case = true, $upper_letters = true)
{
	$letters = 'abcdefghijklmnopqrstuvwxyz';
	$random_symbols = '';
	// Numbers
	if ($numbers) $values = '0123456789';

	// Lower case
	if ($lower_case) $values .= $letters;

	// Upper letters
	if ($upper_letters) $values .= strtoupper($letters);

	$length_values = strlen($values) - 1;

	if ($length_values > 0) {
		for ($h = 0; $h < $length; ++$h)
			$random_symbols .= substr($values, mt_rand(0, $length_values), 1);

		return $random_symbols;
	}
}

function generujLinkAnkiety($conn, $ankietaID, $adres_ip)
{
	if ($adres_ip == '127.0.0.1') $linkSerwer = '';
	else $linkSerwer = 'http://zurawickidesign.pl/ankieta/';
	$sql = mysqli_fetch_assoc(mysqli_query($conn, "SELECT hash FROM a_naglowek WHERE id = " . $ankietaID . ";"));
	$hash = $sql['hash'];
	$link = '<p color="#000"><a href="' . $linkSerwer . 'index.php?page=ankieta&hash=' . $hash . '">Ankieta</a></p>';
	return $link;
}

function registerEmails($conn, $email_details)
{
	$ankietaid = $email_details['ankietaID'];
	$email = $email_details['email'];
	$status = $email_details['status'];
	$dzis = $email_details['dzis'];
	$time = $email_details['time'];
	$sql = "INSERT INTO email_sends (`ankietaID`, `email`, `status`, `data`, `time`) 
	VALUES ($ankietaid, '$email', '$status', '$dzis', '$time');";
	mysqli_query($conn, $sql);
}
