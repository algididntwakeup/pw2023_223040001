<?php
require('functions.php');
$name = 'Home';




//  siapkan data $students
$students = query("SELECT * FROM mahasiswa");

require('views/index.view.php');