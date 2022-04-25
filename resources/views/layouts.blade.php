
<!-- layouts.blade.php => this file just has the links of bootstrap framework okii ok good let' make it then   -->
<html>
    <head>
        <!-- We will set here the css files  -->
        <!-- Let's now download bootstrap files -->
        <!-- Let's make the links of css files now here  -->
        <!-- The question here how can we access to the public directory from the view  folow me -->
        <!--  the method of write allow us to call or code php in view  -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Hal les errurs etafhin hadhom yfadedou asaal hhhhh :p :p hhhhh -->
        <!-- asset is a function that we can with it to access to public directory it is clear ??  -->
        <!-- We make access to the file bootstrap.css -->
        <!-- Sorry all.css is file belongs to the fontawesome we will use it in another way -->
    </head>
    <body>
        @yield('content')
        <button class="btn btn-primary">Evnoyer</button>
        <!-- Ghirba chbih ma 9rach les fichiers  --> tkouniich mochkil version uncompatible?
        <!-- La7dha trah njarbou be cdn balek yemshou  
        hana c bon be cdn yemshi ey-->
        <!-- bref in sha alla tkouni fhamti edoura eli 3milnaha bech affihcina users el7a9 s3iba chwy 5idmit lyoum -->
        <!-- Ey b7okm awel marra 3endek l7a9 ama hataw tzidi tafhmeha akthar ki n3awdoha barcha marrat m3a des taches okhrin nchala -->
        <!-- fhamtich au moins views w route ?? ey bahii barcha emala 7awli lel marra ejaya tasn3ii views jdida  -->
        <!-- Ykoun tableau zay mta3 lyoum tet3adilha be route w t'affichi feha array asn3eha enti 3adi bel php  -->
        <!-- a ab3thihalha nafs khedmet lyou maus just men gher base de donnée w controller just views w route tnajmi ? je pense pas najam wa7di
       -->
        <!-- And here we will set the javascript files  -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        
    </body>
</html>