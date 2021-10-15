
<html>
<head>
    <title>CodeIgniter Tutorial</title>
    <style>
        #menu > li {
            display: inline-block;zoom:1;*display:inline;margin-right:7px;border:1px solid green;padding:4px;
        }
        td,table{
            border:1px solid  black;
        }
        td{ padding:4px; }

    </style>
</head>
<body>
<header>
    <div style="width: 100%;background-color:lightgreen;padding:20px;margin:0">
        <h1><?php echo $title; ?></h1>
    </div>
    <div>
        <ul id="menu">
            <li><a href="/codeigniter/">Welcome</a></li>
            <li><a href="/codeigniter/services/">Services</a></li>
            <li><a href="/codeigniter/manage/add-service">Add Service </a></li>
            <li><a href="/codeigniter/manage/staff">Staff </a></li>
        </ul>
    </div>
</header>

