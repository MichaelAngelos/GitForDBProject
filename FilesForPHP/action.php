<?php
    $mysqli = mysqli_connect('localhost', 'test', 'test', 'elidek');
    if(!$mysqli){
        echo 'Connection error: ' . mysqli_connect_error();
    }else{
        echo '<h1>Το αποτέλεσμα είναι: </h1>';
        if(isset($_POST['submit1']) || isset($_POST['submit2'])){
            if($_POST['query'] == 'q1'){
                $message = "SELECT DISTINCT programm.title as ProgrammName
                FROM programm;";
                if($programms = $mysqli -> query($message)){
                    var_dump($programms);
                    echo '<style>
                            table{
                                font-family: arial, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                            }
                            tr, td{
                                border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;
                            }
                        </style>';
                    echo '<table>
                                <tr>
                                    <th>Programm</th>
                                </tr>';
                    while($row = $programms -> fetch_assoc()){
                        if(isset($row['ProgrammName'])){
                            echo '<tr>';
                            echo '<td>' . $row['ProgrammName'] . '</td>';
                            echo '</tr>';
                        }
                    }
                    echo '</table>';
                }
            }
            else if($_POST['query'] == 'q2'){
                $message = 'CREATE VIEW whatresearcher AS
                SELECT DISTINCT researcher.named as Researcher,project.title as SupervisorOn,worksonproject.projectstitle as WorksOn,evaluates.projectstitle as Evaluates
                FROM researcher
                LEFT JOIN project 
                ON project.researchersname=researcher.named
                LEFT JOIN worksonproject
                on worksonproject.researchersname=researcher.named
                LEFT JOIN evaluates
                on evaluates.researchersname=researcher.named;
                CREATE VIEW sciencefieldtoproject AS
                SELECT DISTINCT scient_field.title as ScienceField,projects_scient_field.projectstitle as ProjectOnScienceField
                FROM scient_field
                INNER JOIN projects_scient_field
                on scient_field.title=projects_scient_field.scientsfieldtitle;
                select * from whatresearcher;
                select * from sciencefieldtoproject;';
                if($res3_2 = $mysqli -> query($message)){
                    var_dump($res3_2);
                }
            }
            else if($_POST['query'] == 'q3'){
                $message = 'SELECT scient_field.title as ScienceField, projects_scient_field.projectstitle as ProjectName,
                worksonproject.researchersname as Researcher
                FROM scient_field
                INNER JOIN projects_scient_field
                ON scient_field.title = projects_scient_field.scientsfieldtitle
                INNER JOIN worksonproject
                ON projects_scient_field.projectstitle = worksonproject.projectstitle
                INNER JOIN project
                ON project.title = projects_scient_field.projectstitle
                WHERE project.ended="0000-00-00"
                ORDER BY scient_field.title;';
                if($res3_4 = $mysqli -> query($message)){
                    //var_dump($res3_5);
                    echo '<style>
                            table{
                                font-family: arial, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                            }
                            tr, td{
                                border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;
                            }
                        </style>';
                    echo '<table>
                                <tr>
                                    <th>ScienceField</th>
                                    <th>ProjectName</th>
                                    <th>Researcher</th>
                                </tr>';
                    while($row = $res3_4 -> fetch_assoc()){
                        if(isset($row['ScienceField']) && isset($row['ProjectName']) && isset($row['Researcher'])){
                            echo '<tr>';
                            echo '<td>' . $row['ScienceField'] . '</td>';
                            echo '<td>' . $row['ProjectName'] . '</td>';
                            echo '<td>' . $row['Researcher'] . '</td>';
                            echo '</tr>';
                        }
                    }
                    echo '</table>';
                }
            }
            else if($_POST['query'] == 'q4'){
                $message = "SELECT DISTINCT a.organismstitle as Field1
                FROM(
                SELECT DISTINCT project.organismstitle,
                    count(project.organismstitle) AS c1,
                    YEAR(project.started) as years
                FROM project
                GROUP BY project.organismstitle,years
                )
                AS a,
                (
                SELECT DISTINCT project.organismstitle,
                    count(project.organismstitle) AS c1,
                    YEAR(project.started) as years
                FROM project
                GROUP BY project.organismstitle,years
                )
                AS b
                WHERE (
                a.organismstitle=b.organismstitle
                AND a.c1=b.c1
                AND a.c1>9
                AND a.years=b.years+1
                )
                ;";
                if($res3_4 = $mysqli -> query($message)){
                    //var_dump($res3_5);
                    echo '<style>
                            table{
                                font-family: arial, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                            }
                            tr, td{
                                border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;
                            }
                        </style>';
                    echo '<table>
                                <tr>
                                    <th>Field1</th>
                                </tr>';
                    while($row = $res3_4 -> fetch_assoc()){
                        if(isset($row['Field1'])){
                            echo '<tr>';
                            echo '<td>' . $row['Field1'] . '</td>';
                            echo '</tr>';
                        }
                    }
                    echo '</table>';
                }
            }
            else if($_POST["query"] == "q5"){
                $message = "select s.scientsfieldtitle as Field1,w.scientsfieldtitle as Field2,count(s.scientsfieldtitle) as stotal from projects_scient_field as s join projects_scient_field as w on s.projectstitle=w.projectstitle
                where s.scientsfieldtitle<>w.scientsfieldtitle
                group by s.scientsfieldtitle,w.scientsfieldtitle 
                order by stotal desc
                limit 3;";
                if($res3_5 = $mysqli -> query($message)){
                    //var_dump($res3_5);
                    echo '<style>
                            table{
                                font-family: arial, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                            }
                            tr, td{
                                border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;
                            }
                        </style>';
                    echo '<table>
                                <tr>
                                    <th>Field1</th>
                                    <th>Field2</th>
                                </tr>';
                    while($row = $res3_5 -> fetch_assoc()){
                        if(isset($row['Field1']) && isset($row['Field2'])){
                            echo '<tr>';
                            echo '<td>' . $row['Field1'] . '</td>';
                            echo '<td>' . $row['Field2'] . '</td>';
                            echo '</tr>';
                        }
                    }
                    echo '</table>';
                }
            }
            else if($_POST['query'] == 'q6'){
                $message = "select named , count(named) totalprojects  from(select r.named,w.projectstitle from researcher as r join worksonproject as w on r.named=w.researchersname where r.birtday>'1982-01-01') as s
                where (projectstitle) in (
                select distinct p.title from worksonproject as w join project as p on w.projectstitle=p.title and p.ended<>'0000-00-00'
                )
                group by named
                order by totalprojects desc
                limit 6;";
                if($res3_6 = $mysqli -> query($message)){
                    echo '<style>
                            table{
                                font-family: arial, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                            }
                            tr, td{
                                border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;
                            }
                        </style>';
                    echo '<table>
                                <tr>
                                    <th>named</th>
                                    <th>totalprojects</th>
                                </tr>';
                    while($row = $res3_6 -> fetch_assoc()){
                        if(isset($row['named']) && isset($row['totalprojects'])){
                            echo '<tr>';
                            echo '<td>' . $row['named'] . '</td>';
                            echo '<td>' . $row['totalprojects'] . '</td>';
                            echo '</tr>';
                        }
                    }
                    echo '</table>';
                }
            }
            else if($_POST['query'] == 'q7'){
                $message = 'select c.badget,p.stemsname from (project as p join company as c on p.organismstitle=c.title) 
                order by c.badget desc
                limit 5;';
                if($res3_7 = $mysqli -> query($message)){
                    echo '<style>
                            table{
                                font-family: arial, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                            }
                            tr, td{
                                border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;
                            }
                        </style>';
                    echo '<table>
                                <tr>
                                    <th>Field1</th>
                                    <th>Field2</th>
                                </tr>';
                    while($row = $res3_7 -> fetch_assoc()){
                        if(isset($row['Field1']) && isset($row['Field2'])){
                            echo '<tr>';
                            echo '<td>' . $row['Field1'] . '</td>';
                            echo '<td>' . $row['Field2'] . '</td>';
                            echo '</tr>';
                        }
                    }
                    echo '</table>';
                }
            }
            else if($_POST['query'] == 'q8'){
                $message = "select named,count(named) totalen from researcher as r join worksonproject as w on r.named=w.researchersname
                where (w.projectstitle) in (
                select p.title from project as p left join deliverd as d on p.title=d.projectstitle where d.title is null
                )
                group by named
                having totalen>2
                order by totalen desc;";
                if($res3_8 = $mysqli -> query($message)){
                    echo '<style>
                            table{
                                font-family: arial, sans-serif;
                                border-collapse: collapse;
                                width: 100%;
                            }
                            tr, td{
                                border: 1px solid #dddddd;
                                text-align: left;
                                padding: 8px;
                            }
                        </style>';
                    echo '<table>
                                <tr>
                                    <th>named</th>
                                    <th>totalen</th>
                                </tr>';
                    while($row = $res3_8 -> fetch_assoc()){
                        if(isset($row['named']) && isset($row['totalen'])){
                            echo '<tr>';
                            echo '<td>' . $row['named'] . '</td>';
                            echo '<td>' . $row['totalen'] . '</td>';
                            echo '</tr>';
                        }
                    }
                    echo '</table>';
                }

            }
        }else{
            echo 'hello';
        }
        $mysqli -> close();
    }
?>