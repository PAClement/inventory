<!DOCTYPE html>
<html>

<head>

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dosis:wght@200&display=swap" rel="stylesheet">
	
    <!--CSS-->
    <link rel="stylesheet" href="css/resume.css">

    <style>

        html,body{
            padding: 0;
            margin: 0;
        }

        /*HEADER*/

        .header--title{
            font-size: 5rem;
            text-align: center;
            margin: 1% 0 3% 0;
            letter-spacing: 2px;
            font-family: 'Josefin Sans', sans-serif;
            color:#E65100;
        }

        .header--slogan{
            font-size: 2rem;
            text-align: center;
            margin: 3%;
            font-family: 'Josefin Sans', sans-serif;
            color: black;
        }

        .header--hr{
            height: 2px;
            background: #E65100;
            margin: 0 25% 3% 25%;
        }

        /*TABLE*/

        th {
            font-size: 2em;
            font-family: 'Josefin Sans', sans-serif;
            color:black;
        }

        tr{
            text-align: center;
        }

        td {
            font-size: 2em;
            font-family: 'Josefin Sans', sans-serif;
            color:black;
        }

        caption {
            font-size: 3em;
            caption-side: top;
            font-family: 'Josefin Sans', sans-serif;
            color:#E65100;
            letter-spacing: 1px;

            margin-bottom: 1.5em;
        }

        table {

            width: 100%;
            
        }

        .resume--table{
            justify-content:center;
        }
    </style>

</head>


<body>

    <div class="header--title">INVEN<span style="color:black;">TORY</span> </div>
	<div class="header--slogan">- Faites votre inventaire en toute simplicité ! -</div>
    <div class="header--hr"></div>

    <div class="resume--table">
        <table>
            <caption>Mon inventaire</caption>
                <tr>
                    <th scope="col">CONTAIN</th>
                    <th scope="col">QUANTITÉ</th>
                </tr>
        
            <?php while($req = $sql->fetch()):?>

                <tr>
                    <td><?= $req['contain'] ?></td>
                    <td><?= $req['quantite'] ?></td>
                </tr>
                    
            <?php endwhile; ?>
        </table>
    </div>


</body>

</html>

