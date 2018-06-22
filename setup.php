<?php
include 'connection.php'; 
$query ="create table if not exists teacher (
fio_teacher varchar (60) NOT NULL,
id_predmet int NOT NULL,
PRIMARY KEY (fio_teacher)
);";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно <br>";
}
$sql = "INSERT INTO teacher (fio_teacher, id_predmet) VALUES 
('Pavlov Petr Petrovich', '11'),
('Malenkova Alena Victorovna', '11'),
('Semenko Alla Egorovna', '22'),
('Silokin Andrey Sergeevich', '33'),
('Lonomok Kirill Alekseevich', '33'),
('Sergeeva Anna Igorevna', '55'),
('Lokalov Denis Ivanovich', '44')";
if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}
$query ="create table predmet (
id_predmet int(10) AUTO_INCREMENT,
name_predmet varchar(30) NOT NULL,
PRIMARY KEY (id_predmet)
);";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}
$sql = "INSERT INTO predmet (id_predmet, name_predmet) VALUES 
('11', 'Matan'),
('22', 'Russian'),
('33', 'English'),
('44', 'German'),
('55', 'Norwegian');";
if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}
$query ="create table cabinet (
id_cabinet int(10) AUTO_INCREMENT,
fio_teacher varchar(60) NOT NULL,
PRIMARY KEY (id_cabinet),
FOREIGN KEY (fio_teacher) REFERENCES teacher (fio_teacher)
);";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}
$sql = "INSERT INTO cabinet (id_cabinet, fio_teacher) VALUES 
('101', 'Pavlov Petr Petrovich'),
('202', 'Semenko Alla Egorovna'),
('303', 'Silokin Andrey Sergeevich'),
('404', 'Lokalov Denis Ivanovich'),
('505', 'Sergeeva Anna Igorevna');";
if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}
$query ="create table gruppa (
id_gruppa int(10) AUTO_INCREMENT,
PRIMARY KEY (id_gruppa)
);";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}
$sql = "INSERT INTO gruppa (id_gruppa) VALUES
('1'),
('2'),
('3'),
('4'),
('5');";
if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}
$query ="create table student (
id_student int(10) AUTO_INCREMENT,
fio_student varchar(60) NOT NULL,
id_gruppa int(10),
PRIMARY KEY (id_student),
FOREIGN KEY (id_gruppa) REFERENCES gruppa (id_gruppa)
);";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}
$sql = "INSERT INTO student (id_student, fio_student, id_gruppa) VALUES 
('111', 'Babenko Matvey Petrovich', '1'),
('222', 'Pusechkin Aleksandr Vasilievich', '2'),
('333', 'Khemlnitskiy Vitaliy Ivanovich', '3'),
('444', 'Trotskiy Ivan Andreevich', '4'),
('555', 'Tyrchaninova Nina Alekseevna', '5'),
('666', 'Stekolnikov Maksim Sergeevich', '1'),
('777', 'Drozd Anastasiya Semenovna', '2'),
('888', 'Lazareva Tatyana Vladimirovna', '3'),
('999', 'Stepanyuk Mariya Petrovna', '4');";
if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}
$query ="create table mark (
id_student int(10),
id_predmet int(10),
id_gruppa int(10),
fio_teacher varchar(60),
mark int,
FOREIGN KEY (id_student) REFERENCES student (id_student),
FOREIGN KEY (id_predmet) REFERENCES predmet (id_predmet),
FOREIGN KEY (id_gruppa) REFERENCES gruppa (id_gruppa),
FOREIGN KEY (fio_teacher) REFERENCES teacher (fio_teacher)
);";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}
$sql = "INSERT INTO mark (id_student, id_predmet, id_gruppa,
fio_teacher, mark) VALUES 
('111', '33', '1', 'Silokin Andrey Sergeevich', '5'),
('111', '11', '1', 'Pavlov Petr Petrovich', '5'),
('222', '11', '2', 'Pavlov Petr Petrovich', '5'),
('222', '22', '2', 'Semenko Alla Egorovna', '4'),
('333', '55', '3', 'Sergeeva Anna Igorevna', '4'),
('333', '33', '3', 'Silokin Andrey Sergeevich', '3'),
('444', '55', '4', 'Sergeeva Anna Igorevna', '5'),
('444', '44', '4', 'Lokalov Denis Ivanovich', '5'),
('555', '11', '5', 'Malenkova Alena Victorovna', '4'),
('555', '55', '5', 'Sergeeva Anna Igorevna', '4'),
('666', '11', '1', 'Pavlov Petr Petrovich', '3'),
('666', '33', '1', 'Silokin Andrey Sergeevich', '3'),
('777', '11', '2', 'Pavlov Petr Petrovich', '3'),
('777', '22', '2', 'Semenko Alla Egorovna', '4'),
('888', '33', '3', 'Silokin Andrey Sergeevich', '4'),
('888', '55', '3', 'Sergeeva Anna Igorevna', '5'),
('999', '44', '4', 'Lokalov Denis Ivanovich', '4'),
('999', '55', '4', 'Sergeeva Anna Igorevna', '3');";
if (mysqli_query($link, $sql)) {
echo "Created successfully<br>";
} else {
echo "Error creating <br>" . mysqli_error($link);
}
$query ="create table timetable (
id_gruppa int(10),
id_predmet int(10),
id_cabinet int(10),
fio_teacher varchar(60),
day varchar(10),
lesson int(1),
FOREIGN KEY (id_gruppa) REFERENCES gruppa (id_gruppa),
FOREIGN KEY (id_predmet) REFERENCES predmet (id_predmet),
FOREIGN KEY (id_cabinet) REFERENCES cabinet (id_cabinet),
FOREIGN KEY (fio_teacher) REFERENCES teacher (fio_teacher)
);";
$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
echo "Выполнение запроса прошло успешно";
}
$sql = "INSERT INTO timetable (id_gruppa, id_predmet, id_cabinet,
fio_teacher, day, lesson) VALUES 
('1', '11', '101', 'Pavlov Petr Petrovich', 'Пн', '1'),
('1', '33', '303', 'Silokin Andrey Sergeevich', 'Чт', '3'),
('2', '11', '101', 'Pavlov Petr Petrovich', 'Пн', '3'),
('2', '22', '202', 'Semenko Alla Egorovna', 'Вт', '2'),
('3', '33', '303', 'Silokin Andrey Sergeevich', 'Вт', '3'),
('3', '55', '505', 'Sergeeva Anna Igorevna', 'Чт', '3'),
('4', '44', '404', 'Lokalov Denis Ivanovich', 'Ср', '3'),
('4', '44', '505', 'Lokalov Denis Ivanovich', 'Чт', '2'),
('4', '55', '202', 'Sergeeva Anna Igorevna', 'Сб', '1'),
('5', '11', '101', 'Malenkova Alena Victorovna', 'Пн', '2'),
('5', '11', '303', 'Malenkova Alena Victorovna', 'Пн', '3'),
('5', '55', '505', 'Sergeeva Anna Igorevna', 'Чт', '1'),
('5', '55', '404', 'Sergeeva Anna Igorevna', 'Пт', '2');";
if (mysqli_query($link, $sql)) {
  echo "<p>Created successfully<br>";
} else {
  echo "<p>Error creating <br>" . mysqli_error($link);
}
mysqli_close($link);