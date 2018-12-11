<?php
$title = "Result Page";
require_once '../view/headerInclude.php';
require_once '../model/model.php';

//test data for filling table, vinnys early test data
$student1 = array(
    array('ID' => '10000414','NAME' => 'Mengel,Justin Andrew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '120.000','GPA' => '3.447','EagleMail_ID' => 'J.A.Mengel@eagle.clarion.edu'),
    array('ID' => '10001641','NAME' => 'Sylvester,Dillon Ray','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2095','Total' => '19.000','GPA' => '1.038','EagleMail_ID' => 'D.R.Sylvester@eagle.clarion.edu'),
    array('ID' => '10002249','NAME' => 'Csorba,Lilla Katalynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '146.000','GPA' => '2.884','EagleMail_ID' => 'L.K.Csorba@eagle.clarion.edu'),
    array('ID' => '10002604','NAME' => 'Ruth,Christopher','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '21.000','GPA' => '2.143','EagleMail_ID' => 'C.Ruth@eagle.clarion.edu'),
    array('ID' => '10002906','NAME' => 'Schroth,Alexander R','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '68.000','GPA' => '2.338','EagleMail_ID' => 'A.R.Schroth@eagle.clarion.edu'),
    array('ID' => '10005115','NAME' => 'Parsons,Wesley Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '127.500','GPA' => '3.841','EagleMail_ID' => 'W.A.Parsons@eagle.clarion.edu'),
    array('ID' => '10005272','NAME' => 'Gheres,Evan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '120.000','GPA' => '2.942','EagleMail_ID' => 'E.Gheres@eagle.clarion.edu'),
    array('ID' => '10005456','NAME' => 'Fratto,Robert P','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '120.000','GPA' => '3.842','EagleMail_ID' => 'R.P.Fratto@eagle.clarion.edu'),
    array('ID' => '10006559','NAME' => 'Gregor,Ryan Dean','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '48.000','GPA' => '1.500','EagleMail_ID' => 'R.D.Gregor@eagle.clarion.edu'),
    array('ID' => '10010355','NAME' => 'Lockwood,Nicholas Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '128.520','GPA' => '3.770','EagleMail_ID' => 'N.E.Lockwood@eagle.clarion.edu'),
    array('ID' => '10012079','NAME' => 'Moorman,Matthew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '16.000','GPA' => '0.867','EagleMail_ID' => 'M.Moorman@eagle.clarion.edu'),
    array('ID' => '10012211','NAME' => 'McClaine,Luke','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '141.000','GPA' => '2.209','EagleMail_ID' => 'L.McClaine@eagle.clarion.edu'),
    array('ID' => '10013353','NAME' => 'Paradise,Jesse Daniel','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '27.000','GPA' => '2.667','EagleMail_ID' => 'J.D.Paradise@eagle.clarion.edu'),
    array('ID' => '10017022','NAME' => 'Cooper,Aaron Russell','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '31.000','GPA' => '0.941','EagleMail_ID' => 'A.R.Cooper@eagle.clarion.edu'),
    array('ID' => '10017674','NAME' => 'Cyphert,Carrie Anne','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '51.000','GPA' => '3.491','EagleMail_ID' => 'C.A.Cyphert1@eagle.clarion.edu'),
    array('ID' => '10017948','NAME' => 'Black,Katie Nicole','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '125.000','GPA' => '3.208','EagleMail_ID' => 'K.N.Black@eagle.clarion.edu'),
    array('ID' => '10017996','NAME' => 'Bailey,Glenn Jermaine','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '119.000','GPA' => '2.534','EagleMail_ID' => 'G.J.Bailey@eagle.clarion.edu'),
    array('ID' => '10018830','NAME' => 'Blackham,Andrew James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '122.000','GPA' => '3.115','EagleMail_ID' => 'A.J.Blackham@eagle.clarion.edu'),
    array('ID' => '10018846','NAME' => 'Barbour,Christopher Adam','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '152.000','GPA' => '3.447','EagleMail_ID' => 'C.A.Barbour@eagle.clarion.edu'),
    array('ID' => '10019858','NAME' => 'O\'Donnell,Zachary R','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '67.000','GPA' => '2.231','EagleMail_ID' => 'Z.R.ODonnell@eagle.clarion.edu'),
    array('ID' => '10020394','NAME' => 'McNaughton,Torey Taylor','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '79.500','GPA' => '2.763','EagleMail_ID' => 'T.T.Mcnaughton@eagle.clarion.edu'),
    array('ID' => '10021282','NAME' => 'Foose,Christopher William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '3.000','GPA' => '0.250','EagleMail_ID' => 'C.W.Foose@eagle.clarion.edu'),
    array('ID' => '10022718','NAME' => 'Karg,Seth Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '120.000','GPA' => '3.324','EagleMail_ID' => 'S.M.Karg@eagle.clarion.edu'),
    array('ID' => '10025557','NAME' => 'Walcott,William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '135.000','GPA' => '3.276','EagleMail_ID' => 'W.Walcott@eagle.clarion.edu'),
    array('ID' => '10025824','NAME' => 'Broersma,Brandon Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '121.000','GPA' => '2.800','EagleMail_ID' => 'B.A.Broersma@eagle.clarion.edu'),
    array('ID' => '10028629','NAME' => 'Sanders,Robert Ethan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2031','Total' => '38.000','GPA' => '1.830','EagleMail_ID' => 'R.E.Sanders@eagle.clarion.edu'),
    array('ID' => '10029854','NAME' => 'Brazil,Quintyn William-Curtis','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '120.000','GPA' => '2.750','EagleMail_ID' => 'Q.W.Brazil@eagle.clarion.edu'),
    array('ID' => '10030689','NAME' => 'Moore,James V','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '123.000','GPA' => '2.821','EagleMail_ID' => 'J.V.Moore@eagle.clarion.edu'),
    array('ID' => '10031852','NAME' => 'Pruett,Robert Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '121.000','GPA' => '3.458','EagleMail_ID' => 'R.L.Pruett@eagle.clarion.edu'),
    array('ID' => '10032263','NAME' => 'Heelan,Kayla Rose','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '121.500','GPA' => '2.231','EagleMail_ID' => 'K.R.Heelan@eagle.clarion.edu'),
    array('ID' => '10032557','NAME' => 'Barclay II,Roy L','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '122.000','GPA' => '2.935','EagleMail_ID' => 'R.L.Barclay@eagle.clarion.edu'),
    array('ID' => '10032681','NAME' => 'Bonfardine,Melissa Kristin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '171.000','GPA' => '3.133','EagleMail_ID' => 'M.K.Bonfardine@eagle.clarion.edu'),
    array('ID' => '10032715','NAME' => 'Adam,Jules Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '15.000','GPA' => '1.161','EagleMail_ID' => 'J.A.Adam@eagle.clarion.edu'),
    array('ID' => '10034008','NAME' => 'Coxson,Taylor Jason','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '146.000','GPA' => '3.484','EagleMail_ID' => 'T.J.Coxson@eagle.clarion.edu'),
    array('ID' => '10034721','NAME' => 'Egolf,Cory Ryan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '121.000','GPA' => '3.783','EagleMail_ID' => 'C.R.Egolf@eagle.clarion.edu'),
    array('ID' => '10034909','NAME' => 'Wayland,Matthew James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '125.000','GPA' => '3.240','EagleMail_ID' => 'M.J.Wayland@eagle.clarion.edu'),
    array('ID' => '10035024','NAME' => 'Love,Matthew Dean','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '60.500','GPA' => '2.450','EagleMail_ID' => 'M.D.Love@eagle.clarion.edu'),
    array('ID' => '10036901','NAME' => 'DeSantis,Kelley R','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '120.000','GPA' => '2.544','EagleMail_ID' => 'K.R.Desantis@eagle.clarion.edu'),
    array('ID' => '10037316','NAME' => 'Fazio,Erica Rose','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '93.000','GPA' => '2.967','EagleMail_ID' => 'E.R.Fazio@eagle.clarion.edu'),
    array('ID' => '10037505','NAME' => 'Stewart,Seth David','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '113.000','GPA' => '1.759','EagleMail_ID' => 'S.D.Stewart@eagle.clarion.edu'),
    array('ID' => '10037515','NAME' => 'Meyerl,Keith Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '132.000','GPA' => '3.008','EagleMail_ID' => 'K.M.Meyerl@eagle.clarion.edu'),
    array('ID' => '10037597','NAME' => 'Vannatten,Jonathan Christian','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '81.000','GPA' => '2.720','EagleMail_ID' => 'J.C.Vannatten@eagle.clarion.edu'),
    array('ID' => '10037701','NAME' => 'Ahmed Sr,Karim Ahmed','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '112.000','GPA' => '1.680','EagleMail_ID' => 'K.A.Ahmed@eagle.clarion.edu'),
    array('ID' => '10038610','NAME' => 'Sussman,Elliot','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '160.000','GPA' => '2.741','EagleMail_ID' => 'E.Sussman@eagle.clarion.edu'),
    array('ID' => '10039973','NAME' => 'Fiorio,John','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '122.000','GPA' => '2.690','EagleMail_ID' => 'J.Fiorio@eagle.clarion.edu'),
    array('ID' => '10040053','NAME' => 'Hunter,Nancie L','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '29.000','GPA' => '0.800','EagleMail_ID' => 'N.L.Hunter@eagle.clarion.edu'),
    array('ID' => '10041076','NAME' => 'Fox,Dylan Lewis','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '26.000','GPA' => '1.548','EagleMail_ID' => 'D.L.Fox@eagle.clarion.edu'),
    array('ID' => '10041939','NAME' => 'McKee,Michael Joseph','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '163.000','GPA' => '3.239','EagleMail_ID' => 'M.J.Mckee@eagle.clarion.edu'),
    array('ID' => '10042585','NAME' => 'Purinton,Douglas Blair','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '151.000','GPA' => '3.792','EagleMail_ID' => 'D.B.Purinton@eagle.clarion.edu'),
    array('ID' => '10042602','NAME' => 'Aites,Linden David','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '156.000','GPA' => '3.765','EagleMail_ID' => 'L.D.Aites@eagle.clarion.edu'),
    array('ID' => '10042603','NAME' => 'Porter,Hunter J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '42.000','GPA' => '2.224','EagleMail_ID' => 'H.J.Porter@eagle.clarion.edu'),
    array('ID' => '10042711','NAME' => 'Janoski,Evan Joseph','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '169.000','GPA' => '3.548','EagleMail_ID' => 'E.J.Janoski@eagle.clarion.edu'),
    array('ID' => '10044488','NAME' => 'Dorsey,Casey Alan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '120.000','GPA' => '2.343','EagleMail_ID' => 'C.A.Dorsey@eagle.clarion.edu'),
    array('ID' => '10044761','NAME' => 'Shaw,Stevi Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2075','Total' => '95.000','GPA' => '2.953','EagleMail_ID' => 'S.L.Shaw@eagle.clarion.edu'),
    array('ID' => '10045003','NAME' => 'Kelly,James Mckenzie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '118.000','GPA' => '2.067','EagleMail_ID' => 'J.M.Kelly@eagle.clarion.edu'),
    array('ID' => '10045019','NAME' => 'Puff,Dan Robert','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2085','Total' => '21.000','GPA' => '1.556','EagleMail_ID' => 'D.R.Puff@eagle.clarion.edu'),
    array('ID' => '10047029','NAME' => 'Appleby,Benjamin Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '133.000','GPA' => '2.986','EagleMail_ID' => 'B.M.Appleby@eagle.clarion.edu'),
    array('ID' => '10048790','NAME' => 'Dennison,Denzil L','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '83.000','GPA' => '2.018','EagleMail_ID' => 'D.L.Dennison@eagle.clarion.edu'),
    array('ID' => '10049867','NAME' => 'Stover,Matthew Curtis','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '121.500','GPA' => '3.281','EagleMail_ID' => 'M.C.Stover@eagle.clarion.edu'),
    array('ID' => '10051018','NAME' => 'Ward,Mary Catherine','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2085','Total' => '120.000','GPA' => '2.564','EagleMail_ID' => 'M.C.Ward@eagle.clarion.edu'),
    array('ID' => '10051450','NAME' => 'Flaskos,Harry Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '120.000','GPA' => '3.100','EagleMail_ID' => 'H.M.Flaskos@eagle.clarion.edu'),
    array('ID' => '10051487','NAME' => 'Gallo,Allison Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '132.000','GPA' => '2.969','EagleMail_ID' => 'A.M.Gallo@eagle.clarion.edu'),
    array('ID' => '10051981','NAME' => 'Gathers,Matthew Ryan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '53.000','GPA' => '1.962','EagleMail_ID' => 'M.R.Gathers@eagle.clarion.edu'),
    array('ID' => '10052608','NAME' => 'Allshouse,Audrey Michaela','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '106.680','GPA' => '2.553','EagleMail_ID' => 'A.M.Allshouse@eagle.clarion.edu'),
    array('ID' => '10053762','NAME' => 'Jamison,Dustin Leroy','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '129.000','GPA' => '3.814','EagleMail_ID' => 'D.L.Jamison@eagle.clarion.edu'),
    array('ID' => '10054430','NAME' => 'Kenney,Christopher A','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '60.000','GPA' => '2.183','EagleMail_ID' => 'C.A.Kenney@eagle.clarion.edu'),
    array('ID' => '10054436','NAME' => 'Stamler,Christian Andrew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '126.000','GPA' => '2.587','EagleMail_ID' => 'C.A.Stamler@eagle.clarion.edu'),
    array('ID' => '10054634','NAME' => 'Cotton,Christina Nicole','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '120.500','GPA' => '3.075','EagleMail_ID' => 'C.N.Cotton@eagle.clarion.edu'),
    array('ID' => '10054796','NAME' => 'Mateer,Martin Reed','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '12.000','GPA' => '0.600','EagleMail_ID' => 'M.R.Mateer@eagle.clarion.edu'),
    array('ID' => '10055976','NAME' => 'Rosario,Antonio Luis','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2085','Total' => '131.000','GPA' => '2.143','EagleMail_ID' => 'A.L.Rosario@eagle.clarion.edu'),
    array('ID' => '10056336','NAME' => 'Shearer,Patrick J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '139.000','GPA' => '2.777','EagleMail_ID' => 'P.J.Shearer@eagle.clarion.edu'),
    array('ID' => '10056890','NAME' => 'Fiel III,Melvin Andrew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '72.500','GPA' => '3.861','EagleMail_ID' => 'M.A.Fiel@eagle.clarion.edu'),
    array('ID' => '10057204','NAME' => 'Wedekind,Skylor D','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '125.500','GPA' => '2.664','EagleMail_ID' => 'S.D.Wedekind@eagle.clarion.edu'),
    array('ID' => '10057546','NAME' => 'Beck,Corey Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '121.000','GPA' => '3.446','EagleMail_ID' => 'C.A.Beck@eagle.clarion.edu'),
    array('ID' => '10058200','NAME' => 'Fredley,Michael S','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '61.000','GPA' => '2.750','EagleMail_ID' => 'M.S.Fredley@eagle.clarion.edu'),
    array('ID' => '10059330','NAME' => 'Bordas,Jesse Raymond','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '89.000','GPA' => '3.824','EagleMail_ID' => 'J.R.Bordas@eagle.clarion.edu'),
    array('ID' => '10061352','NAME' => 'Pekular,Nicholas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2061','Total' => '42.000','GPA' => '2.595','EagleMail_ID' => 'N.Pekular@eagle.clarion.edu'),
    array('ID' => '10061409','NAME' => 'Leahy Jr,James M','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '63.000','GPA' => '2.694','EagleMail_ID' => 'J.M.Leahy@eagle.clarion.edu'),
    array('ID' => '10061519','NAME' => 'Ferringer,Brandon Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '12.000','GPA' => '2.500','EagleMail_ID' => 'B.M.Ferringer@eagle.clarion.edu'),
    array('ID' => '10062563','NAME' => 'Craig,Randall Dale','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '77.000','GPA' => '0.333','EagleMail_ID' => 'R.D.Craig@eagle.clarion.edu'),
    array('ID' => '10063394','NAME' => 'Clark,Nicholas Ryan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '130.000','GPA' => '2.316','EagleMail_ID' => 'N.R.Clark@eagle.clarion.edu'),
    array('ID' => '10063684','NAME' => 'Weaver,Jared Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '133.000','GPA' => '3.621','EagleMail_ID' => 'J.E.Weaver2@eagle.clarion.edu'),
    array('ID' => '10064064','NAME' => 'Niver,Nathanael P.','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2085','Total' => '21.000','GPA' => '0.871','EagleMail_ID' => 'N.P.Niver@eagle.clarion.edu'),
    array('ID' => '10064095','NAME' => 'Moser,Ross W','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '118.000','GPA' => '4.000','EagleMail_ID' => 'R.W.Moser@eagle.clarion.edu'),
    array('ID' => '10064124','NAME' => 'Wisniewski,Brandon Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '120.000','GPA' => '3.256','EagleMail_ID' => 'B.L.Wisniewski@eagle.clarion.edu'),
    array('ID' => '10064139','NAME' => 'Hawley,Jacob L','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '127.000','GPA' => '3.952','EagleMail_ID' => 'J.L.Hawley@eagle.clarion.edu'),
    array('ID' => '10064302','NAME' => 'Couslin,Amy Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '132.000','GPA' => '2.439','EagleMail_ID' => 'A.L.Couslin@eagle.clarion.edu'),
    array('ID' => '10064363','NAME' => 'Steele,Dana Rachelle','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '120.000','GPA' => '3.642','EagleMail_ID' => 'D.R.Steele@eagle.clarion.edu'),
    array('ID' => '10066281','NAME' => 'Brown,Daniel Joseph','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '123.000','GPA' => '2.575','EagleMail_ID' => 'D.J.Brown2@eagle.clarion.edu'),
    array('ID' => '10066870','NAME' => 'Anderson,Alex','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '148.000','GPA' => '2.581','EagleMail_ID' => 'A.Anderson3@eagle.clarion.edu'),
    array('ID' => '10066947','NAME' => 'Sargent,Kuante C','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2095','Total' => '61.000','GPA' => '3.655','EagleMail_ID' => 'K.C.Sargent@eagle.clarion.edu'),
    array('ID' => '10068421','NAME' => 'Naugle II,Steven Wesley','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '195.500','GPA' => '2.969','EagleMail_ID' => 'S.W.Naugle@eagle.clarion.edu'),
    array('ID' => '10068506','NAME' => 'Dicker Jr,Jason Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '120.000','GPA' => '2.708','EagleMail_ID' => 'J.E.Dicker@eagle.clarion.edu'),
    array('ID' => '10068586','NAME' => 'Greene,Jesse M','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '30.000','GPA' => '1.889','EagleMail_ID' => 'J.M.Greene@eagle.clarion.edu'),
    array('ID' => '10069478','NAME' => 'Marreiro Abilio,Luciano','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '60.000','GPA' => '1.632','EagleMail_ID' => 'L.Marreiroabilio@eagle.clarion.edu'),
    array('ID' => '10070845','NAME' => 'Hart,Patrick James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '122.000','GPA' => '2.259','EagleMail_ID' => 'P.J.Hart@eagle.clarion.edu'),
    array('ID' => '10072365','NAME' => 'Malik,Shahida Ashraf','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '120.000','GPA' => '4.000','EagleMail_ID' => 'S.A.Malik@eagle.clarion.edu'),
    array('ID' => '10072959','NAME' => 'Cesare,Daniel Brian','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '87.000','GPA' => '2.512','EagleMail_ID' => 'D.B.Cesare@eagle.clarion.edu'),
    array('ID' => '10073143','NAME' => 'Coyle,Shane Erik','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '69.000','GPA' => '1.864','EagleMail_ID' => 'S.E.Coyle@eagle.clarion.edu'),
    array('ID' => '10073284','NAME' => 'Ban,James Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '27.000','GPA' => '2.333','EagleMail_ID' => 'J.M.Ban@eagle.clarion.edu'),
    array('ID' => '10075203','NAME' => 'Garibay,Xavier Wolf','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '78.000','GPA' => '2.218','EagleMail_ID' => 'X.W.Garibay@eagle.clarion.edu'),
    array('ID' => '10076782','NAME' => 'Cain,Michael Paul','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '121.000','GPA' => '2.590','EagleMail_ID' => 'M.P.Cain@eagle.clarion.edu'),
    array('ID' => '10076844','NAME' => 'Frey,Trenton Mitchell','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '123.000','GPA' => '2.983','EagleMail_ID' => 'T.M.Frey@eagle.clarion.edu'),
    array('ID' => '10077315','NAME' => 'Curtis,Timothy Austin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2109','Total' => '144.000','GPA' => '2.273','EagleMail_ID' => 'T.A.Curtis@eagle.clarion.edu'),
    array('ID' => '10077369','NAME' => 'Becker,Joshua Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '159.000','GPA' => '2.671','EagleMail_ID' => 'J.L.Becker1@eagle.clarion.edu'),
    array('ID' => '10077461','NAME' => 'Hancock,Melissa N','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '133.000','GPA' => '3.361','EagleMail_ID' => 'M.N.Hancock@eagle.clarion.edu'),
    array('ID' => '10079081','NAME' => 'McFadden,Jessica Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '139.000','GPA' => '2.683','EagleMail_ID' => 'J.L.McFadden@eagle.clarion.edu'),
    array('ID' => '10079365','NAME' => 'King,Kyler Brandon','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '148.000','GPA' => '3.698','EagleMail_ID' => 'K.B.King@eagle.clarion.edu'),
    array('ID' => '10079626','NAME' => 'Cracraft,Kelly Michelle','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '3.000','GPA' => '0.200','EagleMail_ID' => 'K.M.Cracraft@eagle.clarion.edu'),
    array('ID' => '10079833','NAME' => 'Ames,William Blake','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '85.000','GPA' => '2.723','EagleMail_ID' => 'W.B.Ames@eagle.clarion.edu'),
    array('ID' => '10079890','NAME' => 'Royster,Pria Renae','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '123.000','GPA' => '2.752','EagleMail_ID' => 'P.R.Royster@eagle.clarion.edu'),
    array('ID' => '10079934','NAME' => 'Reilly,Jacquelyn A','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '96.000','GPA' => '2.529','EagleMail_ID' => 'J.A.Reilly@eagle.clarion.edu'),
    array('ID' => '10081495','NAME' => 'Fitzgerald,Sean Patrick','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '141.000','GPA' => '3.654','EagleMail_ID' => 'S.P.Fitzgerald@eagle.clarion.edu'),
    array('ID' => '10082006','NAME' => 'White,Steven Chad','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '24.000','GPA' => '1.875','EagleMail_ID' => 'S.C.White@eagle.clarion.edu'),
    array('ID' => '10082058','NAME' => 'Sullivan,Kelly Lynne','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '98.000','GPA' => '2.406','EagleMail_ID' => 'K.L.Sullivan@eagle.clarion.edu'),
    array('ID' => '10083163','NAME' => 'Huegel Jr,Michael James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '120.000','GPA' => '3.283','EagleMail_ID' => 'S.Huegel@eagle.clarion.edu'),
    array('ID' => '10083990','NAME' => 'Welch,James Philip','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'J.P.Welch@eagle.clarion.edu'),
    array('ID' => '10084008','NAME' => 'Gossett,Colton Joshua','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2085','Total' => '141.000','GPA' => '2.531','EagleMail_ID' => 'C.J.Gossett@eagle.clarion.edu'),
    array('ID' => '10084029','NAME' => 'Botzer,Richele Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '55.000','GPA' => '1.932','EagleMail_ID' => 'R.L.Botzer@eagle.clarion.edu'),
    array('ID' => '10085890','NAME' => 'Banks,Christion Maurell','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '125.000','GPA' => '2.190','EagleMail_ID' => 'C.M.Banks@eagle.clarion.edu'),
    array('ID' => '10086170','NAME' => 'Hill,Daniel William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '82.000','GPA' => '3.817','EagleMail_ID' => 'D.W.Hill@eagle.clarion.edu'),
    array('ID' => '10086547','NAME' => 'Corbett,Ian Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '102.000','GPA' => '2.618','EagleMail_ID' => 'I.E.Corbett@eagle.clarion.edu'),
    array('ID' => '10087818','NAME' => 'Griebel,Christopher Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '25.000','GPA' => '2.679','EagleMail_ID' => 'C.M.Griebel@eagle.clarion.edu'),
    array('ID' => '10088337','NAME' => 'Clarke,Gregory L','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '120.000','GPA' => '3.048','EagleMail_ID' => 'G.L.Clarke@eagle.clarion.edu'),
    array('ID' => '10088533','NAME' => 'Thomas,Amanda Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '39.000','GPA' => '1.188','EagleMail_ID' => 'A.L.Thomas3@eagle.clarion.edu'),
    array('ID' => '10090340','NAME' => 'Keener,Christopher Martin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '151.000','GPA' => '2.524','EagleMail_ID' => 'C.M.Keener@eagle.clarion.edu'),
    array('ID' => '10091005','NAME' => 'Combetty,Kalyn Elizabeth','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '134.000','GPA' => '2.900','EagleMail_ID' => 'K.E.Combetty@eagle.clarion.edu'),
    array('ID' => '10092345','NAME' => 'Whisner,Caitlin K','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '31.000','GPA' => '1.086','EagleMail_ID' => 'C.K.Whisner@eagle.clarion.edu'),
    array('ID' => '10092593','NAME' => 'Shrawder,Zachary Vallen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '121.000','GPA' => '2.417','EagleMail_ID' => 'Z.V.Shrawder@eagle.clarion.edu'),
    array('ID' => '10092684','NAME' => 'Corbin,Zachary Alan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2095','Total' => '121.000','GPA' => '3.018','EagleMail_ID' => 'Z.A.Corbin@eagle.clarion.edu'),
    array('ID' => '10093263','NAME' => 'Green,Victoria Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '39.000','GPA' => '1.786','EagleMail_ID' => 'V.M.Green@eagle.clarion.edu'),
    array('ID' => '10095249','NAME' => 'Bush,Johnathan Eric','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2175','Total' => '123.000','GPA' => '2.602','EagleMail_ID' => 'J.E.Bush@eagle.clarion.edu'),
    array('ID' => '10096149','NAME' => 'Kelosky,Daniel','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '178.000','GPA' => '3.000','EagleMail_ID' => 'D.Kelosky@eagle.clarion.edu'),
    array('ID' => '10097772','NAME' => 'Lorenz,Brian Samuel','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '24.000','GPA' => '1.163','EagleMail_ID' => 'B.S.Lorenz@eagle.clarion.edu'),
    array('ID' => '10097790','NAME' => 'Caldwell,Charles Calvin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '34.500','GPA' => '1.404','EagleMail_ID' => 'C.C.Caldwell@eagle.clarion.edu'),
    array('ID' => '10097792','NAME' => 'Frye,Christopher Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '120.000','GPA' => '3.593','EagleMail_ID' => 'C.T.Frye@eagle.clarion.edu'),
    array('ID' => '10097824','NAME' => 'Berrier,Shannon N','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2109','Total' => '121.000','GPA' => '3.810','EagleMail_ID' => 'S.N.Berrier@eagle.clarion.edu'),
    array('ID' => '10097838','NAME' => 'Berendt,Todd William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '125.500','GPA' => '2.992','EagleMail_ID' => 'T.W.Berendt@eagle.clarion.edu'),
    array('ID' => '10099469','NAME' => 'Perrin,Andrew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '122.000','GPA' => '2.992','EagleMail_ID' => 'A.Perrin@eagle.clarion.edu'),
    array('ID' => '10099829','NAME' => 'Lewis,Yasmin L\'Mae Geneva','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '124.500','GPA' => '3.393','EagleMail_ID' => 'Y.L.Lewis@eagle.clarion.edu'),
    array('ID' => '10101425','NAME' => 'Maitland,Keith Hartley','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '129.000','GPA' => '3.267','EagleMail_ID' => 'K.H.Maitland@eagle.clarion.edu'),
    array('ID' => '10102026','NAME' => 'Shick,Thomas J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '123.000','GPA' => '2.740','EagleMail_ID' => 'T.J.Shick@eagle.clarion.edu'),
    array('ID' => '10102048','NAME' => 'Hawkins,Shawn Richard','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '84.000','GPA' => '1.991','EagleMail_ID' => 'S.R.Hawkins@eagle.clarion.edu'),
    array('ID' => '10102102','NAME' => 'Gabler,John Owen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '60.500','GPA' => '1.727','EagleMail_ID' => 'J.O.Gabler@eagle.clarion.edu'),
    array('ID' => '10102720','NAME' => 'Boyko,Aaron Scott','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '120.000','GPA' => '4.000','EagleMail_ID' => 'A.S.Boyko@eagle.clarion.edu'),
    array('ID' => '10104327','NAME' => 'Leschner,Gary','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '122.000','GPA' => '2.870','EagleMail_ID' => 'G.Leschner@eagle.clarion.edu'),
    array('ID' => '10104625','NAME' => 'McLaughlin Jr,Charles Hugh','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'C.H.Mclaughlin1@eagle.clarion.edu'),
    array('ID' => '10106938','NAME' => 'Rosell,Megan Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2085','Total' => '113.770','GPA' => '2.107','EagleMail_ID' => 'M.L.Rosell@eagle.clarion.edu'),
    array('ID' => '10107517','NAME' => 'Leavitt,Jake Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '122.000','GPA' => '2.537','EagleMail_ID' => 'J.A.Leavitt@eagle.clarion.edu'),
    array('ID' => '10108401','NAME' => 'Cook,Anthony Brice','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '135.790','GPA' => '3.279','EagleMail_ID' => 'A.B.Cook@eagle.clarion.edu'),
    array('ID' => '10108797','NAME' => 'Semovoski,Nathan Mark','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '130.500','GPA' => '3.054','EagleMail_ID' => 'N.M.Semovoski@eagle.clarion.edu'),
    array('ID' => '10109917','NAME' => 'Kirkland,Delmar Robin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '130.000','GPA' => '2.700','EagleMail_ID' => 'D.R.Kirkland@eagle.clarion.edu'),
    array('ID' => '10110280','NAME' => 'Love,Kyle','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '120.000','GPA' => '2.966','EagleMail_ID' => 'K.Love1@eagle.clarion.edu'),
    array('ID' => '10110362','NAME' => 'Bessetti,Riley Noelle','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '122.000','GPA' => '2.946','EagleMail_ID' => 'R.N.Bessetti@eagle.clarion.edu'),
    array('ID' => '10111367','NAME' => 'Galvan,Danny','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '1971','Total' => '11.000','GPA' => '0.690','EagleMail_ID' => 'D.Galvan@eagle.clarion.edu'),
    array('ID' => '10111966','NAME' => 'Savini,Andrew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '121.000','GPA' => '2.714','EagleMail_ID' => 'A.Savini@eagle.clarion.edu'),
    array('ID' => '10112037','NAME' => 'Wyatt,Jamie Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '123.000','GPA' => '3.632','EagleMail_ID' => 'J.M.Wyatt@eagle.clarion.edu'),
    array('ID' => '10112725','NAME' => 'Cujas,Alyssa Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '104.500','GPA' => '2.311','EagleMail_ID' => 'A.M.Cujas@eagle.clarion.edu'),
    array('ID' => '10112867','NAME' => 'Dillion,Jason Wade','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '93.000','GPA' => '2.495','EagleMail_ID' => 'J.W.Dillion@eagle.clarion.edu'),
    array('ID' => '10114513','NAME' => 'Santiago,Brandon James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '120.000','GPA' => '3.920','EagleMail_ID' => 'B.J.Santiago@eagle.clarion.edu'),
    array('ID' => '10114914','NAME' => 'Schlosky,Minh Tam Tammy','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '105.000','GPA' => '2.929','EagleMail_ID' => 'M.T.Schlosky@eagle.clarion.edu'),
    array('ID' => '10115080','NAME' => 'Pursley,Alexia Carmen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '106.000','GPA' => '1.963','EagleMail_ID' => 'A.C.Pursley@eagle.clarion.edu'),
    array('ID' => '10115346','NAME' => 'Fishinger,Todd Randall','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '122.000','GPA' => '2.270','EagleMail_ID' => 'T.R.Fishinger@eagle.clarion.edu'),
    array('ID' => '10116767','NAME' => 'Hinderliter,Parker Dion','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '65.000','GPA' => '2.783','EagleMail_ID' => 'P.D.Hinderliter@eagle.clarion.edu'),
    array('ID' => '10116801','NAME' => 'Krizon,Nathanael Cole','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '156.000','GPA' => '2.435','EagleMail_ID' => 'N.C.Krizon@eagle.clarion.edu'),
    array('ID' => '10117962','NAME' => 'Joseph,Roldy','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '22.000','GPA' => '2.625','EagleMail_ID' => 'R.Joseph@eagle.clarion.edu'),
    array('ID' => '10118136','NAME' => 'Wirth,Jakob','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2079','Total' => '12.000','GPA' => '2.500','EagleMail_ID' => 'J.Wirth@eagle.clarion.edu'),
    array('ID' => '10118140','NAME' => 'Shipman,Jordan Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '121.000','GPA' => '2.949','EagleMail_ID' => 'J.M.Shipman@eagle.clarion.edu'),
    array('ID' => '10119316','NAME' => 'Kerle,Joseph','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '151.000','GPA' => '2.583','EagleMail_ID' => 'J.Kerle1@eagle.clarion.edu'),
    array('ID' => '10119753','NAME' => 'Klingensmith,Jerod Bruce','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '176.000','GPA' => '3.284','EagleMail_ID' => 'J.B.Klingensmith@eagle.clarion.edu'),
    array('ID' => '10120211','NAME' => 'Wood,Benjamin Hunter','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '43.000','GPA' => '2.096','EagleMail_ID' => 'B.H.Wood@eagle.clarion.edu'),
    array('ID' => '10120821','NAME' => 'Starr,Jake Anthony','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '175.000','GPA' => '3.061','EagleMail_ID' => 'J.A.Starr@eagle.clarion.edu'),
    array('ID' => '10122258','NAME' => 'Pressley,Lonnie Baker','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '123.000','GPA' => '2.224','EagleMail_ID' => 'L.B.Pressley@eagle.clarion.edu'),
    array('ID' => '10124054','NAME' => 'Jenkins,Chelsea Monei','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '125.000','GPA' => '3.264','EagleMail_ID' => 'C.M.Jenkins@eagle.clarion.edu'),
    array('ID' => '10124077','NAME' => 'Underwood,Dylan Richard','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '48.000','GPA' => '3.938','EagleMail_ID' => 'D.R.Underwood@eagle.clarion.edu'),
    array('ID' => '10125946','NAME' => 'Seger,Toby R','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2105','Total' => '128.000','GPA' => '3.148','EagleMail_ID' => 'T.R.Seger@eagle.clarion.edu'),
    array('ID' => '10126314','NAME' => 'Cooper,Drew Alexander','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2115','Total' => '50.000','GPA' => '1.868','EagleMail_ID' => 'D.A.Cooper@eagle.clarion.edu'),
    array('ID' => '10126499','NAME' => 'Turner,Jason James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '31.000','GPA' => '2.116','EagleMail_ID' => 'J.J.Turner@eagle.clarion.edu'),
    array('ID' => '10126696','NAME' => 'Owen Jr,Damian Troy','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '38.000','GPA' => '1.453','EagleMail_ID' => 'D.T.Owen@eagle.clarion.edu'),
    array('ID' => '10129231','NAME' => 'Parrish,Stephanie Michelle','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '80.000','GPA' => '2.000','EagleMail_ID' => 'S.M.Parrish@eagle.clarion.edu'),
    array('ID' => '10131329','NAME' => 'Robinson,Austin James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '129.000','GPA' => '2.757','EagleMail_ID' => 'A.J.Robinson1@eagle.clarion.edu'),
    array('ID' => '10131477','NAME' => 'Lieberum,Taylor','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '133.000','GPA' => '3.382','EagleMail_ID' => 'T.Lieberum@eagle.clarion.edu'),
    array('ID' => '10131523','NAME' => 'Loss,Stefanos','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '123.000','GPA' => '3.525','EagleMail_ID' => 'S.Loss@eagle.clarion.edu'),
    array('ID' => '10133207','NAME' => 'Walsh,David James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '179.160','GPA' => '2.793','EagleMail_ID' => 'D.J.Walsh@eagle.clarion.edu'),
    array('ID' => '10133423','NAME' => 'Alter,John David','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2018','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'J.D.Alter@eagle.clarion.edu'),
    array('ID' => '10134136','NAME' => 'Latagliata,Allison Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '133.000','GPA' => '3.137','EagleMail_ID' => 'A.M.Latagliata@eagle.clarion.edu'),
    array('ID' => '10134145','NAME' => 'Jeffries,Chase William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '140.000','GPA' => '3.820','EagleMail_ID' => 'C.W.Jeffries@eagle.clarion.edu'),
    array('ID' => '10136152','NAME' => 'Jendesky,Adam Robert','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '27.000','GPA' => '4.000','EagleMail_ID' => 'A.R.Jendesky@eagle.clarion.edu'),
    array('ID' => '10136327','NAME' => 'Bullers,David Miles','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '127.000','GPA' => '2.339','EagleMail_ID' => 'D.M.Bullers@eagle.clarion.edu'),
    array('ID' => '10136503','NAME' => 'Weiher,Mary Elizabeth','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '50.000','GPA' => '2.500','EagleMail_ID' => 'M.E.Weiher@eagle.clarion.edu'),
    array('ID' => '10138578','NAME' => 'Troup,Joshua Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '121.500','GPA' => '3.737','EagleMail_ID' => 'J.L.Troup1@eagle.clarion.edu'),
    array('ID' => '10139702','NAME' => 'Zionkowski,Brad Steven','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '120.000','GPA' => '3.200','EagleMail_ID' => 'B.S.Zionkowski@eagle.clarion.edu'),
    array('ID' => '10139917','NAME' => 'Schons,Ryan Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '158.000','GPA' => '3.456','EagleMail_ID' => 'R.E.Schons@eagle.clarion.edu'),
    array('ID' => '10142387','NAME' => 'Bobak,Nicholas Christopher','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '88.000','GPA' => '1.446','EagleMail_ID' => 'N.C.Bobak@eagle.clarion.edu'),
    array('ID' => '10143067','NAME' => 'Barker,Gregory John','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '152.000','GPA' => '3.838','EagleMail_ID' => 'G.J.Barker@eagle.clarion.edu'),
    array('ID' => '10143304','NAME' => 'Kremmel,Gregory A','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '79.000','GPA' => '1.816','EagleMail_ID' => 'G.A.Kremmel@eagle.clarion.edu'),
    array('ID' => '10145004','NAME' => 'Snyder,Devan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '80.000','GPA' => '2.603','EagleMail_ID' => 'D.Snyder@eagle.clarion.edu'),
    array('ID' => '10145035','NAME' => 'Ekainjoh,Fon Sheldon','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '153.500','GPA' => '3.933','EagleMail_ID' => 'F.S.Ekainjoh@eagle.clarion.edu'),
    array('ID' => '10146800','NAME' => 'Davis,Kirsten R','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '123.000','GPA' => '3.049','EagleMail_ID' => 'K.R.Davis1@eagle.clarion.edu'),
    array('ID' => '10149438','NAME' => 'Scopel,Dustin Joseph','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '123.000','GPA' => '3.738','EagleMail_ID' => 'D.J.Scopel@eagle.clarion.edu'),
    array('ID' => '10157140','NAME' => 'Margo,Cameron James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '127.000','GPA' => '2.423','EagleMail_ID' => 'C.J.Margo@eagle.clarion.edu'),
    array('ID' => '10157351','NAME' => 'Brownley,Caleb Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '135.000','GPA' => '2.807','EagleMail_ID' => 'C.E.Brownley@eagle.clarion.edu'),
    array('ID' => '10158996','NAME' => 'Turner,Michael Stephen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '57.000','GPA' => '2.667','EagleMail_ID' => 'M.S.Turner1@eagle.clarion.edu'),
    array('ID' => '10160185','NAME' => 'Curley Jr,Randall Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '89.000','GPA' => '2.889','EagleMail_ID' => 'R.L.Curley@eagle.clarion.edu'),
    array('ID' => '10161329','NAME' => 'Baker,Andrew John','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2089','Total' => '123.000','GPA' => '2.521','EagleMail_ID' => 'A.J.Baker@eagle.clarion.edu'),
    array('ID' => '10173063','NAME' => 'Karenbauer,Jessica Irene','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '121.000','GPA' => '2.247','EagleMail_ID' => 'J.I.Karenbauer@eagle.clarion.edu'),
    array('ID' => '10174366','NAME' => 'Awan,Jordan A','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '120.000','GPA' => '3.233','EagleMail_ID' => 'J.A.Awan@eagle.clarion.edu'),
    array('ID' => '10174799','NAME' => 'Grossman,Phillip Tyler','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '74.000','GPA' => '2.060','EagleMail_ID' => 'P.T.Grossman@eagle.clarion.edu'),
    array('ID' => '10175044','NAME' => 'Lasher,Jessica Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '155.180','GPA' => '2.790','EagleMail_ID' => 'J.L.Lasher@eagle.clarion.edu'),
    array('ID' => '10397365','NAME' => 'Wrye,Cody M','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '138.000','GPA' => '3.818','EagleMail_ID' => 'C.M.Wrye@eagle.clarion.edu'),
    array('ID' => '10403975','NAME' => 'Corridori,Daniel James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '61.000','GPA' => '2.525','EagleMail_ID' => 'D.J.Corridori@eagle.clarion.edu'),
    array('ID' => '10415249','NAME' => 'Markert,Isaiah Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '123.000','GPA' => '3.118','EagleMail_ID' => 'I.T.Markert@eagle.clarion.edu'),
    array('ID' => '10449238','NAME' => 'Burch,Brendan T','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '54.000','GPA' => '1.789','EagleMail_ID' => 'B.T.Burch@eagle.clarion.edu'),
    array('ID' => '10451642','NAME' => 'Norris,Curt Marshall','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '146.000','GPA' => '2.545','EagleMail_ID' => 'C.M.Norris@eagle.clarion.edu'),
    array('ID' => '10453277','NAME' => 'Anderson,Jacob Scott','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '30.000','GPA' => '2.000','EagleMail_ID' => 'J.S.Anderson@eagle.clarion.edu'),
    array('ID' => '10454324','NAME' => 'Patterson Jr,Leonard Darryl','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '43.500','GPA' => '2.814','EagleMail_ID' => 'L.D.Patterson@eagle.clarion.edu'),
    array('ID' => '10454529','NAME' => 'McKenzie,Dustin William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2078','Total' => '27.000','GPA' => '3.000','EagleMail_ID' => 'D.W.Mckenzie@eagle.clarion.edu'),
    array('ID' => '10455059','NAME' => 'McPhaul-Barr,Shaquan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2105','Total' => '52.000','GPA' => '2.667','EagleMail_ID' => 'S.Mcphaulbarr@eagle.clarion.edu'),
    array('ID' => '10458832','NAME' => 'Campbell,Jennifer Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '117.000','GPA' => '2.382','EagleMail_ID' => 'J.L.Campbell3@eagle.clarion.edu'),
    array('ID' => '10460849','NAME' => 'Carnovale,Jon M','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '3.000','GPA' => '0.167','EagleMail_ID' => 'J.M.Carnovale@eagle.clarion.edu'),
    array('ID' => '10460859','NAME' => 'Kephart,Jadzia Tyr','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '122.500','GPA' => '3.584','EagleMail_ID' => 'J.T.Kephart@eagle.clarion.edu'),
    array('ID' => '10461277','NAME' => 'Cunningham,Cory David','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '92.000','GPA' => '2.204','EagleMail_ID' => 'C.D.Cunningham@eagle.clarion.edu'),
    array('ID' => '10461495','NAME' => 'Strahl,Ethan Eric','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '125.500','GPA' => '2.748','EagleMail_ID' => 'E.E.Strahl@eagle.clarion.edu'),
    array('ID' => '10461539','NAME' => 'Koslof,Alison Nicole','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '144.000','GPA' => '2.639','EagleMail_ID' => 'A.N.Koslof@eagle.clarion.edu'),
    array('ID' => '10462151','NAME' => 'Johnson,Lonnie Dion','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '120.500','GPA' => '3.636','EagleMail_ID' => 'L.D.Johnson@eagle.clarion.edu'),
    array('ID' => '10462171','NAME' => 'Elder,Hunter J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '28.000','GPA' => '2.690','EagleMail_ID' => 'H.J.Elder@eagle.clarion.edu'),
    array('ID' => '10462198','NAME' => 'Sulkosky,Jacob Aaron','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '73.000','GPA' => '1.647','EagleMail_ID' => 'J.A.Sulkosky@eagle.clarion.edu'),
    array('ID' => '10462264','NAME' => 'Singerman,Mariah N.','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '27.000','GPA' => '1.538','EagleMail_ID' => 'M.N.Singerman@eagle.clarion.edu'),
    array('ID' => '10462315','NAME' => 'Folmar,Marie Elizabeth','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '37.500','GPA' => '1.927','EagleMail_ID' => 'M.E.Folmar@eagle.clarion.edu'),
    array('ID' => '10463203','NAME' => 'Pugliese,Danielle Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '81.000','GPA' => '3.012','EagleMail_ID' => 'D.M.Pugliese@eagle.clarion.edu'),
    array('ID' => '10463630','NAME' => 'Orloff,James T','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '128.000','GPA' => '3.887','EagleMail_ID' => 'J.T.Orloff@eagle.clarion.edu'),
    array('ID' => '10466079','NAME' => 'Grenus Jr,Anthony Paul','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '130.500','GPA' => '2.715','EagleMail_ID' => 'A.P.Grenus@eagle.clarion.edu'),
    array('ID' => '10466093','NAME' => 'Hoffman,Ryan Franklin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '54.000','GPA' => '2.604','EagleMail_ID' => 'R.F.Hoffman@eagle.clarion.edu'),
    array('ID' => '10466197','NAME' => 'Lingenfelter,Andrew David','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '123.000','GPA' => '3.195','EagleMail_ID' => 'A.D.Lingenfelter@eagle.clarion.edu'),
    array('ID' => '10466651','NAME' => 'DiVito,Kaitlyn Nicole','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '72.500','GPA' => '2.833','EagleMail_ID' => 'K.N.Divito@eagle.clarion.edu'),
    array('ID' => '10466834','NAME' => 'Desai,Sharvil Haresh','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '47.000','GPA' => '1.694','EagleMail_ID' => 'S.H.Desai1@eagle.clarion.edu'),
    array('ID' => '10466856','NAME' => 'Dangrow,William M','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2081','Total' => '33.000','GPA' => '3.182','EagleMail_ID' => 'W.M.Dangrow@eagle.clarion.edu'),
    array('ID' => '10467319','NAME' => 'Heckathorn,Charles Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '124.500','GPA' => '2.243','EagleMail_ID' => 'C.A.Heckathorn@eagle.clarion.edu'),
    array('ID' => '10469249','NAME' => 'Cooper Jr,Thomas L','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2095','Total' => '81.000','GPA' => '2.450','EagleMail_ID' => 'T.L.Cooper@eagle.clarion.edu'),
    array('ID' => '10469288','NAME' => 'Fairel,Ronell Douglas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '143.000','GPA' => '3.473','EagleMail_ID' => 'R.D.Fairel@eagle.clarion.edu'),
    array('ID' => '10490976','NAME' => 'Richardson Jr,Robert Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '122.000','GPA' => '3.595','EagleMail_ID' => 'R.A.Richardson@eagle.clarion.edu'),
    array('ID' => '10492141','NAME' => 'Grabb,Emily Arlene','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2125','Total' => '113.000','GPA' => '2.496','EagleMail_ID' => 'E.A.Grabb@eagle.clarion.edu'),
    array('ID' => '10492667','NAME' => 'Bloom,Bryce Aaron','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '6.000','GPA' => '0.400','EagleMail_ID' => 'B.A.Bloom@eagle.clarion.edu'),
    array('ID' => '10508010','NAME' => 'Tarasi,Paul Joseph','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '130.000','GPA' => '2.357','EagleMail_ID' => 'P.J.Tarasi@eagle.clarion.edu'),
    array('ID' => '10509502','NAME' => 'McElhinny,Trevor Joseph','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '120.320','GPA' => '3.643','EagleMail_ID' => 'T.J.Mcelhinny@eagle.clarion.edu'),
    array('ID' => '10509518','NAME' => 'Corvino,Melissa Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '39.000','GPA' => '3.923','EagleMail_ID' => 'M.M.Corvino@eagle.clarion.edu'),
    array('ID' => '10510956','NAME' => 'Smith,Jedediah Justin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '100.500','GPA' => '2.426','EagleMail_ID' => 'J.J.Smith2@eagle.clarion.edu'),
    array('ID' => '10511168','NAME' => 'Yeager,Samuel Steven','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '61.000','GPA' => '1.863','EagleMail_ID' => 'S.S.Yeager@eagle.clarion.edu'),
    array('ID' => '10511252','NAME' => 'Cyphert,David Robert','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '120.500','GPA' => '3.645','EagleMail_ID' => 'D.R.Cyphert@eagle.clarion.edu'),
    array('ID' => '10511626','NAME' => 'Baney,Donald Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '48.500','GPA' => '3.500','EagleMail_ID' => 'D.T.Baney@eagle.clarion.edu'),
    array('ID' => '10511649','NAME' => 'Wolfe,Zachary Richard','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '15.000','GPA' => '1.111','EagleMail_ID' => 'Z.R.Wolfe@eagle.clarion.edu'),
    array('ID' => '10511833','NAME' => 'Snelick,Victoria Paige','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2135','Total' => '155.500','GPA' => '3.665','EagleMail_ID' => 'V.P.Snelick@eagle.clarion.edu'),
    array('ID' => '10511889','NAME' => 'Tamba,Jonah','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '6.000','GPA' => '0.625','EagleMail_ID' => 'J.Tamba@eagle.clarion.edu'),
    array('ID' => '10511997','NAME' => 'Holben,Jaima Elizabeth','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '21.000','GPA' => '4.000','EagleMail_ID' => 'J.E.Holben@eagle.clarion.edu'),
    array('ID' => '10513319','NAME' => 'Thomas,Aloin Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2115','Total' => '87.000','GPA' => '2.033','EagleMail_ID' => 'A.L.Thomas1@eagle.clarion.edu'),
    array('ID' => '10513494','NAME' => 'Bennett,Gina Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '9.000','GPA' => '0.321','EagleMail_ID' => 'G.M.Bennett@eagle.clarion.edu'),
    array('ID' => '10513513','NAME' => 'Caesar,Todjaee Bryheim','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2095','Total' => '3.000','GPA' => '2.000','EagleMail_ID' => 'T.B.Caesar@eagle.clarion.edu'),
    array('ID' => '10513706','NAME' => 'Mankos,Christopher Francis','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '136.000','GPA' => '2.522','EagleMail_ID' => 'C.F.Mankos@eagle.clarion.edu'),
    array('ID' => '10513710','NAME' => 'Reichard,Bennett M','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '81.000','GPA' => '2.056','EagleMail_ID' => 'B.M.Reichard@eagle.clarion.edu'),
    array('ID' => '10513714','NAME' => 'Arkus,Robert John','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2105','Total' => '41.000','GPA' => '1.460','EagleMail_ID' => 'R.J.Arkus@eagle.clarion.edu'),
    array('ID' => '10513755','NAME' => 'Felker,Tyler Jay','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '120.000','GPA' => '3.309','EagleMail_ID' => 'T.J.Felker@eagle.clarion.edu'),
    array('ID' => '10514194','NAME' => 'Shick,Jerry Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '160.000','GPA' => '3.868','EagleMail_ID' => 'J.L.Shick@eagle.clarion.edu'),
    array('ID' => '10515210','NAME' => 'Dailey,Justin Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '22.000','GPA' => '0.000','EagleMail_ID' => 'J.M.Dailey@eagle.clarion.edu'),
    array('ID' => '10515871','NAME' => 'Tanner,Steve Myron','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '69.000','GPA' => '3.591','EagleMail_ID' => 'S.M.Tanner@eagle.clarion.edu'),
    array('ID' => '10516282','NAME' => 'Traister Jr,George Roger','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '120.500','GPA' => '3.641','EagleMail_ID' => 'G.R.Traister@eagle.clarion.edu'),
    array('ID' => '10516285','NAME' => 'Fischer,Zachary Dean','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '120.500','GPA' => '3.373','EagleMail_ID' => 'Z.D.Fischer@eagle.clarion.edu'),
    array('ID' => '10516425','NAME' => 'Knip,Florian Julien Lothar','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'F.J.Knip@eagle.clarion.edu'),
    array('ID' => '10516452','NAME' => 'Hughes,Trapper Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '124.000','GPA' => '2.626','EagleMail_ID' => 'T.A.Hughes@eagle.clarion.edu'),
    array('ID' => '10516703','NAME' => 'Packard,Brandon Tyler','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2145','Total' => '142.000','GPA' => '2.657','EagleMail_ID' => 'B.T.Packard@eagle.clarion.edu'),
    array('ID' => '10517085','NAME' => 'Aboueita,Mohab Nady Mohamed','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '122.000','GPA' => '3.202','EagleMail_ID' => 'M.N.Aboueita@eagle.clarion.edu'),
    array('ID' => '10517775','NAME' => 'Gabler,Jessica Leigh','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '65.820','GPA' => '1.250','EagleMail_ID' => 'J.L.Gabler@eagle.clarion.edu'),
    array('ID' => '10517820','NAME' => 'Sentz,Jacob Harrison','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '21.000','GPA' => '1.778','EagleMail_ID' => 'J.H.Sentz@eagle.clarion.edu'),
    array('ID' => '10518049','NAME' => 'Stanton,Elizabeth Carrie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '75.000','GPA' => '2.092','EagleMail_ID' => 'E.C.Stanton@eagle.clarion.edu'),
    array('ID' => '10518440','NAME' => 'Schlosky,Minh Tam Tammy','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '139.000','GPA' => '3.929','EagleMail_ID' => 'M.T.Schlosky@eagle.clarion.edu'),
    array('ID' => '10518478','NAME' => 'Hellein,Adam','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '136.000','GPA' => '2.613','EagleMail_ID' => 'A.Hellein@eagle.clarion.edu'),
    array('ID' => '10519716','NAME' => 'Walcott,William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '150.000','GPA' => '3.978','EagleMail_ID' => 'W.Walcott@eagle.clarion.edu'),
    array('ID' => '10520308','NAME' => 'Morres,Elijah G','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '82.000','GPA' => '3.545','EagleMail_ID' => 'E.G.Morres@eagle.clarion.edu'),
    array('ID' => '10520667','NAME' => 'Shukla,Devesh Yogesh','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '48.000','GPA' => '3.688','EagleMail_ID' => 'D.Y.Shukla@eagle.clarion.edu'),
    array('ID' => '10521320','NAME' => 'Dickensheets,Karl','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2088','Total' => '6.000','GPA' => '1.000','EagleMail_ID' => 'K.Dickensheets@eagle.clarion.edu'),
    array('ID' => '10521371','NAME' => 'Uber,Leanna Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '146.000','GPA' => '3.852','EagleMail_ID' => 'L.M.Uber@eagle.clarion.edu'),
    array('ID' => '10521882','NAME' => 'Hogg,Catherine E','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '141.000','GPA' => '2.754','EagleMail_ID' => 'C.E.Hogg@eagle.clarion.edu'),
    array('ID' => '10522218','NAME' => 'Bloss,Justin James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2115','Total' => '71.000','GPA' => '1.960','EagleMail_ID' => 'J.J.Bloss@eagle.clarion.edu'),
    array('ID' => '10522255','NAME' => 'Coniglio,Vincent James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '125.000','GPA' => '3.928','EagleMail_ID' => 'V.J.Coniglio@eagle.clarion.edu'),
    array('ID' => '10522401','NAME' => 'Sherer,Paul Marshall','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '120.000','GPA' => '2.598','EagleMail_ID' => 'P.M.Sherer@eagle.clarion.edu'),
    array('ID' => '10522562','NAME' => 'Duncan,Rebecca Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '129.000','GPA' => '3.520','EagleMail_ID' => 'R.L.Duncan1@eagle.clarion.edu'),
    array('ID' => '10522609','NAME' => 'Ferringer,Brett Anthony','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '70.000','GPA' => '2.580','EagleMail_ID' => 'B.A.Ferringer@eagle.clarion.edu'),
    array('ID' => '10523692','NAME' => 'Perfilio,Terrance Andrew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '84.000','GPA' => '3.226','EagleMail_ID' => 'T.A.Perfilio@eagle.clarion.edu'),
    array('ID' => '10523848','NAME' => 'Heasley,Justin Franklin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '24.000','GPA' => '1.583','EagleMail_ID' => 'J.F.Heasley@eagle.clarion.edu'),
    array('ID' => '10523874','NAME' => 'Branton,Kyle Johnson','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '120.000','GPA' => '3.150','EagleMail_ID' => 'K.J.Branton@eagle.clarion.edu'),
    array('ID' => '10524908','NAME' => 'Lytle,Keith Robert','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '120.000','GPA' => '3.359','EagleMail_ID' => 'K.R.Lytle@eagle.clarion.edu'),
    array('ID' => '10524919','NAME' => 'Speer,Cameron Dennis','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2135','Total' => '49.000','GPA' => '1.583','EagleMail_ID' => 'C.D.Speer@eagle.clarion.edu'),
    array('ID' => '10525141','NAME' => 'Walker,Zamir S.','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '30.000','GPA' => '2.400','EagleMail_ID' => 'Z.S.Walker@eagle.clarion.edu'),
    array('ID' => '10525180','NAME' => 'Pinheiro de Carvalho,Gabriel','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '121.500','GPA' => '3.203','EagleMail_ID' => 'G.Pinheirodecarvalho@eagle.clarion.edu'),
    array('ID' => '10525400','NAME' => 'Johnson,Raleigh Richard','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '149.500','GPA' => '3.456','EagleMail_ID' => 'R.R.Johnson@eagle.clarion.edu'),
    array('ID' => '10525571','NAME' => 'Shiner,Nicholas A','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '158.000','GPA' => '3.046','EagleMail_ID' => 'N.A.Shiner@eagle.clarion.edu'),
    array('ID' => '10525883','NAME' => 'Boudal,Ahmad Khalid','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '60.000','GPA' => '3.333','EagleMail_ID' => 'A.K.Boudal@eagle.clarion.edu'),
    array('ID' => '10525965','NAME' => 'Goodman,Jarrod M.','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '18.000','GPA' => '0.571','EagleMail_ID' => 'J.M.Goodman@eagle.clarion.edu'),
    array('ID' => '10526275','NAME' => 'Sullivan,Emory Elizabeth','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2135','Total' => '135.000','GPA' => '3.189','EagleMail_ID' => 'E.E.Sullivan@eagle.clarion.edu'),
    array('ID' => '10526518','NAME' => 'Stefaniak,Blayze Russell','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '53.000','GPA' => '2.547','EagleMail_ID' => 'B.R.Stefaniak@eagle.clarion.edu'),
    array('ID' => '10554147','NAME' => 'Gluth,Teresa Danielle','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '85.000','GPA' => '3.055','EagleMail_ID' => 'T.D.Tickle@eagle.clarion.edu'),
    array('ID' => '10557128','NAME' => 'Kessler,Noah Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '9.000','GPA' => '0.512','EagleMail_ID' => 'N.A.Kessler1@eagle.clarion.edu'),
    array('ID' => '10558587','NAME' => 'Brent,Daniel John','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2149','Total' => '111.000','GPA' => '2.222','EagleMail_ID' => 'D.J.Brent@eagle.clarion.edu'),
    array('ID' => '10558650','NAME' => 'Holben,Tyler Stephen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '123.500','GPA' => '3.707','EagleMail_ID' => 'T.S.Holben@eagle.clarion.edu'),
    array('ID' => '10559441','NAME' => 'Hancock,Adam','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '131.000','GPA' => '3.058','EagleMail_ID' => 'A.Hancock@eagle.clarion.edu'),
    array('ID' => '10560093','NAME' => 'Aten,Robert Joel','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '127.000','GPA' => '3.065','EagleMail_ID' => 'R.J.Aten@eagle.clarion.edu'),
    array('ID' => '10562405','NAME' => 'Jones,Lindsey Elizabeth','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '137.500','GPA' => '2.361','EagleMail_ID' => 'L.E.Jones1@eagle.clarion.edu'),
    array('ID' => '10562413','NAME' => 'Lake,Timothy','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '18.000','GPA' => '1.182','EagleMail_ID' => 'T.Lake@eagle.clarion.edu'),
    array('ID' => '10563856','NAME' => 'Wilson,Marvin Gale','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '93.000','GPA' => '2.317','EagleMail_ID' => 'M.G.Wilson@eagle.clarion.edu'),
    array('ID' => '10563915','NAME' => 'Trisoline,Matthew Steven','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '123.000','GPA' => '2.256','EagleMail_ID' => 'M.S.Trisoline@eagle.clarion.edu'),
    array('ID' => '10564154','NAME' => 'Hill,Lisa Renell','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '42.000','GPA' => '2.400','EagleMail_ID' => 'L.R.Hill1@eagle.clarion.edu'),
    array('ID' => '10564326','NAME' => 'Ohene-Kwapong,Benjamin Nathan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '15.000','GPA' => '0.645','EagleMail_ID' => 'B.N.Ohene-Kwapong@eagle.clarion.edu'),
    array('ID' => '10564726','NAME' => 'Wallace,Matthew Aaron','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '45.000','GPA' => '2.800','EagleMail_ID' => 'M.A.Wallace@eagle.clarion.edu'),
    array('ID' => '10564837','NAME' => 'Bakaysa,John Martin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '152.000','GPA' => '3.895','EagleMail_ID' => 'J.M.Bakaysa@eagle.clarion.edu'),
    array('ID' => '10565271','NAME' => 'Harp,Marli Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '171.000','GPA' => '2.452','EagleMail_ID' => 'M.M.Harp@eagle.clarion.edu'),
    array('ID' => '10565344','NAME' => 'Deloe,Alec Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '138.000','GPA' => '3.214','EagleMail_ID' => 'A.M.Deloe@eagle.clarion.edu'),
    array('ID' => '10565408','NAME' => 'Dzelamonyuy Ngah,Divine','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '120.000','GPA' => '3.700','EagleMail_ID' => 'D.N.Divine@eagle.clarion.edu'),
    array('ID' => '10566033','NAME' => 'Patel,Chintan H','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '114.000','GPA' => '2.350','EagleMail_ID' => 'C.H.Patel@eagle.clarion.edu'),
    array('ID' => '10566228','NAME' => 'Marchioni,Emily E','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '11.000','GPA' => '0.000','EagleMail_ID' => 'E.E.Marchioni@eagle.clarion.edu'),
    array('ID' => '10566334','NAME' => 'Bartoletti,Melissa Rose','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '122.000','GPA' => '3.310','EagleMail_ID' => 'M.R.Bartoletti@eagle.clarion.edu'),
    array('ID' => '10566371','NAME' => 'Petruzzello,Michael Joseph','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2129','Total' => '40.000','GPA' => '1.143','EagleMail_ID' => 'M.J.Petruzzello@eagle.clarion.edu'),
    array('ID' => '10567587','NAME' => 'Shilala,Dustin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '88.000','GPA' => '2.127','EagleMail_ID' => 'D.Shilala@eagle.clarion.edu'),
    array('ID' => '10567639','NAME' => 'Gregory,Samuel Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '126.000','GPA' => '3.244','EagleMail_ID' => 'S.T.Gregory@eagle.clarion.edu'),
    array('ID' => '10568013','NAME' => 'Reitz,Ben Douglas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2095','Total' => '3.000','GPA' => '1.000','EagleMail_ID' => 'B.D.Reitz@eagle.clarion.edu'),
    array('ID' => '10568107','NAME' => 'Hetrick,Carmine W','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '86.000','GPA' => '2.417','EagleMail_ID' => 'C.W.Hetrick@eagle.clarion.edu'),
    array('ID' => '10568279','NAME' => 'Champion,Jonathan Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '163.500','GPA' => '3.086','EagleMail_ID' => 'J.E.Champion@eagle.clarion.edu'),
    array('ID' => '10568340','NAME' => 'Wells,Troy Garret','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '145.000','GPA' => '3.407','EagleMail_ID' => 'T.G.Wells@eagle.clarion.edu'),
    array('ID' => '10568439','NAME' => 'Lyons,Haley Nicole','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '105.000','GPA' => '3.484','EagleMail_ID' => 'H.N.Lyons@eagle.clarion.edu'),
    array('ID' => '10568455','NAME' => 'Gardner,Rebecca','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '30.000','GPA' => '1.308','EagleMail_ID' => 'R.Gardner@eagle.clarion.edu'),
    array('ID' => '10568474','NAME' => 'Fox,Curtis E','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '129.000','GPA' => '3.008','EagleMail_ID' => 'C.E.Fox@eagle.clarion.edu'),
    array('ID' => '10568476','NAME' => 'Snow,Brittany Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '21.000','GPA' => '1.667','EagleMail_ID' => 'B.L.Snow@eagle.clarion.edu'),
    array('ID' => '10568537','NAME' => 'Fitzpatrick,Neil Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '15.000','GPA' => '3.400','EagleMail_ID' => 'N.T.Fitzpatrick@eagle.clarion.edu'),
    array('ID' => '10568636','NAME' => 'Balliet,Adam','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '6.000','GPA' => '0.222','EagleMail_ID' => 'A.Balliet@eagle.clarion.edu'),
    array('ID' => '10568648','NAME' => 'Al Ali,Amna Habib','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '9.000','GPA' => '3.333','EagleMail_ID' => 'A.H.AlAli@eagle.clarion.edu'),
    array('ID' => '10568795','NAME' => 'Sutliff,Betsy Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '147.000','GPA' => '3.175','EagleMail_ID' => 'B.M.Sutliff@eagle.clarion.edu'),
    array('ID' => '10569062','NAME' => 'Confer III,John R ,III','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2115','Total' => '67.000','GPA' => '1.081','EagleMail_ID' => 'J.R.Confer@eagle.clarion.edu'),
    array('ID' => '10569151','NAME' => 'Kosko,Jarrett R','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '120.000','GPA' => '2.642','EagleMail_ID' => 'J.R.Kosko@eagle.clarion.edu'),
    array('ID' => '10569779','NAME' => 'Snelick,Zachary W','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '120.000','GPA' => '3.538','EagleMail_ID' => 'Z.W.Snelick@eagle.clarion.edu'),
    array('ID' => '10569871','NAME' => 'Cesare,Michael Dominic','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2135','Total' => '111.000','GPA' => '2.125','EagleMail_ID' => 'M.D.Cesare@eagle.clarion.edu'),
    array('ID' => '10570167','NAME' => 'Frontz,Chad Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '120.000','GPA' => '2.825','EagleMail_ID' => 'C.A.Frontz@eagle.clarion.edu'),
    array('ID' => '10570224','NAME' => 'Crowe,Cameron Anthony','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '26.000','GPA' => '1.667','EagleMail_ID' => 'C.A.Crowe@eagle.clarion.edu'),
    array('ID' => '10570387','NAME' => 'Hoessler,Brittany N','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '27.000','GPA' => '1.703','EagleMail_ID' => 'B.N.Hoessler@eagle.clarion.edu'),
    array('ID' => '10570650','NAME' => 'Swantner,Kevin Richard','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '15.000','GPA' => '0.750','EagleMail_ID' => 'K.R.Swantner@eagle.clarion.edu'),
    array('ID' => '10570888','NAME' => 'Meyers,Stephanie Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '66.000','GPA' => '2.133','EagleMail_ID' => 'S.L.Meyers@eagle.clarion.edu'),
    array('ID' => '10571000','NAME' => 'Rowles,Brandon','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '120.000','GPA' => '3.133','EagleMail_ID' => 'B.Rowles@eagle.clarion.edu'),
    array('ID' => '10571323','NAME' => 'Torney,Joel Anthony','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '225.000','GPA' => '2.788','EagleMail_ID' => 'J.A.Torney@eagle.clarion.edu'),
    array('ID' => '10571550','NAME' => 'Orcutt,Tyler','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '120.000','GPA' => '3.198','EagleMail_ID' => 'T.Orcutt@eagle.clarion.edu'),
    array('ID' => '10572374','NAME' => 'Baker,Rusty Dean','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '40.000','GPA' => '1.780','EagleMail_ID' => 'R.D.Baker@eagle.clarion.edu'),
    array('ID' => '10572729','NAME' => 'Bazile,David','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2139','Total' => '56.000','GPA' => '2.929','EagleMail_ID' => 'D.Bazile@eagle.clarion.edu'),
    array('ID' => '10572735','NAME' => 'Kalbaugh,David Andrew','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '116.000','GPA' => '3.319','EagleMail_ID' => 'D.A.Kalbaugh@eagle.clarion.edu'),
    array('ID' => '10572868','NAME' => 'Lash,Amanda Grace','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2098','Total' => '10.000','GPA' => '1.200','EagleMail_ID' => 'A.G.Lash@eagle.clarion.edu'),
    array('ID' => '10573429','NAME' => 'Yard,Brendan James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '15.000','GPA' => '1.143','EagleMail_ID' => 'B.J.Yard@eagle.clarion.edu'),
    array('ID' => '10573583','NAME' => 'Rossi,Matthew John','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '104.000','GPA' => '1.922','EagleMail_ID' => 'M.J.Rossi@eagle.clarion.edu'),
    array('ID' => '10574254','NAME' => 'McGourty,Patrick Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '19.500','GPA' => '1.000','EagleMail_ID' => 'P.T.Mcgourty@eagle.clarion.edu'),
    array('ID' => '10574678','NAME' => 'Rees,Brenda Ann','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '132.500','GPA' => '2.262','EagleMail_ID' => 'B.A.Rees@eagle.clarion.edu'),
    array('ID' => '10578702','NAME' => 'Joe,Waylon Randy','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '156.000','GPA' => '3.303','EagleMail_ID' => 'W.R.Joe@eagle.clarion.edu'),
    array('ID' => '10578797','NAME' => 'Barrows,Gordon Vaill','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '121.000','GPA' => '3.889','EagleMail_ID' => 'G.V.Barrows@eagle.clarion.edu'),
    array('ID' => '10579013','NAME' => 'Hodakovsky,Anna A','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '15.000','GPA' => '1.000','EagleMail_ID' => 'A.A.Hodakovsky@eagle.clarion.edu'),
    array('ID' => '10579159','NAME' => 'Thompson,Jonathan Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '120.000','GPA' => '3.575','EagleMail_ID' => 'J.E.Thompson@eagle.clarion.edu'),
    array('ID' => '10581378','NAME' => 'Dancisin,Zachary Joseph','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2179','Total' => '120.000','GPA' => '3.100','EagleMail_ID' => 'Z.J.Dancisin@eagle.clarion.edu'),
    array('ID' => '10581380','NAME' => 'Borland,Lydia Renee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '157.000','GPA' => '4.000','EagleMail_ID' => 'L.R.Borland@eagle.clarion.edu'),
    array('ID' => '10583626','NAME' => 'Koerper,Matthew Ryan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '27.000','GPA' => '1.077','EagleMail_ID' => 'M.R.Koerper@eagle.clarion.edu'),
    array('ID' => '10584795','NAME' => 'Faiola,Mark A','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '130.050','GPA' => '2.157','EagleMail_ID' => 'M.A.Faiola@eagle.clarion.edu'),
    array('ID' => '10584871','NAME' => 'Deloe,Alec Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '126.000','GPA' => '2.966','EagleMail_ID' => 'A.M.Deloe@eagle.clarion.edu'),
    array('ID' => '10584894','NAME' => 'Lauer,Christopher Anthony','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2095','Total' => '6.000','GPA' => '1.000','EagleMail_ID' => 'C.A.Lauer@eagle.clarion.edu'),
    array('ID' => '10587026','NAME' => 'Whipple,John Richard A','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '12.000','GPA' => '3.250','EagleMail_ID' => 'J.R.Whipple@eagle.clarion.edu'),
    array('ID' => '10588514','NAME' => 'Ingram,Monica Faith','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '122.000','GPA' => '3.279','EagleMail_ID' => 'M.F.Ingram@eagle.clarion.edu'),
    array('ID' => '10588749','NAME' => 'Golemboski,Daniel','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '137.000','GPA' => '2.725','EagleMail_ID' => 'D.Golemboski@eagle.clarion.edu'),
    array('ID' => '10588841','NAME' => 'Schoch,Jamie J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '126.500','GPA' => '2.408','EagleMail_ID' => 'J.J.Schoch@eagle.clarion.edu'),
    array('ID' => '10589232','NAME' => 'Berger,Andrea Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '181.000','GPA' => '3.829','EagleMail_ID' => 'A.L.Berger@eagle.clarion.edu'),
    array('ID' => '10589474','NAME' => 'Kuan,Kevin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '121.000','GPA' => '2.273','EagleMail_ID' => 'K.Kuan@eagle.clarion.edu'),
    array('ID' => '10589620','NAME' => 'Andrusz,Nicole Alexandra','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '30.000','GPA' => '2.909','EagleMail_ID' => 'N.A.Andrusz@eagle.clarion.edu'),
    array('ID' => '10589642','NAME' => 'Rougerio,Arthur Paul','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '18.000','GPA' => '1.750','EagleMail_ID' => 'A.P.Rougerio@eagle.clarion.edu'),
    array('ID' => '10589762','NAME' => 'Werwie,Jason','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '134.000','GPA' => '3.860','EagleMail_ID' => 'J.Werwie@eagle.clarion.edu'),
    array('ID' => '10590656','NAME' => 'St John,Melanie Faith','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2101','Total' => '12.000','GPA' => '0.375','EagleMail_ID' => 'M.F.StJohn@eagle.clarion.edu'),
    array('ID' => '10590750','NAME' => 'Ubbink,Paul Howard','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2108','Total' => '12.000','GPA' => '3.000','EagleMail_ID' => 'P.H.Ubbink@eagle.clarion.edu'),
    array('ID' => '10590901','NAME' => 'Wheatley,Tasha Nicole','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '50.000','GPA' => '2.032','EagleMail_ID' => 'T.N.Wheatley@eagle.clarion.edu'),
    array('ID' => '10591156','NAME' => 'Przewlocki,Joshua Paul','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '131.500','GPA' => '2.888','EagleMail_ID' => 'J.P.Przewlocki@eagle.clarion.edu'),
    array('ID' => '10598194','NAME' => 'Weres,Kurt Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '123.000','GPA' => '3.051','EagleMail_ID' => 'K.M.Weres@eagle.clarion.edu'),
    array('ID' => '10602446','NAME' => 'Kiester Sr,Michael A','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '148.000','GPA' => '3.800','EagleMail_ID' => 'M.A.Kiester@eagle.clarion.edu'),
    array('ID' => '10602697','NAME' => 'Hetzler III,Norman Aurthur','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '122.000','GPA' => '3.682','EagleMail_ID' => 'N.A.Hetzler@eagle.clarion.edu'),
    array('ID' => '10606410','NAME' => 'Sterner,Cynthia Ann','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '81.000','GPA' => '3.962','EagleMail_ID' => 'C.A.Sterner@eagle.clarion.edu'),
    array('ID' => '10608075','NAME' => 'Stiner,Laura Anne','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2145','Total' => '120.000','GPA' => '3.408','EagleMail_ID' => 'L.A.Stiner@eagle.clarion.edu'),
    array('ID' => '10608230','NAME' => 'Goodspeed,Matthew Wayne','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '86.000','GPA' => '1.770','EagleMail_ID' => 'M.W.Goodspeed@eagle.clarion.edu'),
    array('ID' => '10630502','NAME' => 'Ross,Tyler Alan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2111','Total' => '33.000','GPA' => '3.000','EagleMail_ID' => 'T.A.Ross@eagle.clarion.edu'),
    array('ID' => '10653696','NAME' => 'Stewart,Jacob Daniel','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '120.000','GPA' => '3.167','EagleMail_ID' => 'J.D.Stewart@eagle.clarion.edu'),
    array('ID' => '10653705','NAME' => 'Clinger Jr,Mark Leroy','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '162.000','GPA' => '3.188','EagleMail_ID' => 'M.L.Clinger@eagle.clarion.edu'),
    array('ID' => '11013704','NAME' => 'Krow,Tyler','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '27.000','GPA' => '3.778','EagleMail_ID' => 'T.J.Krow@eagle.clarion.edu'),
    array('ID' => '11013718','NAME' => 'Hodges,Timothy David','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '126.000','GPA' => '3.722','EagleMail_ID' => 'T.D.Hodges@eagle.clarion.edu'),
    array('ID' => '11013974','NAME' => 'Hester,DeVaughn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '135.000','GPA' => '2.312','EagleMail_ID' => 'D.Hester@eagle.clarion.edu'),
    array('ID' => '11014042','NAME' => 'Grant,Justin Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '139.000','GPA' => '3.300','EagleMail_ID' => 'J.L.Grant@eagle.clarion.edu'),
    array('ID' => '11014045','NAME' => 'Freeman,Andre R','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '12.000','GPA' => '1.000','EagleMail_ID' => 'A.R.Freeman@eagle.clarion.edu'),
    array('ID' => '11014070','NAME' => 'Glasgow,Dawn Elizabeth','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '167.000','GPA' => '3.338','EagleMail_ID' => 'D.E.Glasgow@eagle.clarion.edu'),
    array('ID' => '11014141','NAME' => 'Rodrigues Pereira,Wellington','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '120.000','GPA' => '2.900','EagleMail_ID' => 'W.Rodriguespereira@eagle.clarion.edu'),
    array('ID' => '11014174','NAME' => 'Micosky,Kristy L','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '57.000','GPA' => '1.864','EagleMail_ID' => 'K.L.Micosky@eagle.clarion.edu'),
    array('ID' => '11014216','NAME' => 'Sheldon,Matthew C','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '40.000','GPA' => '2.300','EagleMail_ID' => 'M.C.Sheldon@eagle.clarion.edu'),
    array('ID' => '11014226','NAME' => 'McDonald,Eric C','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '22.000','GPA' => '1.162','EagleMail_ID' => 'E.C.McDonald@eagle.clarion.edu'),
    array('ID' => '11014287','NAME' => 'Stierheim,Tarin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '124.000','GPA' => '3.975','EagleMail_ID' => 'T.Stierheim@eagle.clarion.edu'),
    array('ID' => '11014500','NAME' => 'Evans,William Alan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '107.000','GPA' => '2.770','EagleMail_ID' => 'W.A.Evans@eagle.clarion.edu'),
    array('ID' => '11014516','NAME' => 'KhaledSayef,Abu Saleh Mohammad','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '2.000','GPA' => '0.333','EagleMail_ID' => 'A.S.KhaledSayef@eagle.clarion.edu'),
    array('ID' => '11014525','NAME' => 'Armstrong,Jacob Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '78.000','GPA' => '3.154','EagleMail_ID' => 'J.L.Armstrong1@eagle.clarion.edu'),
    array('ID' => '11014614','NAME' => 'Mannerino,Tyler Scott','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '30.000','GPA' => '3.900','EagleMail_ID' => 'T.S.Mannerino@eagle.clarion.edu'),
    array('ID' => '11014694','NAME' => 'Switzer,Michael A.','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '135.000','GPA' => '2.652','EagleMail_ID' => 'M.A.Switzer@eagle.clarion.edu'),
    array('ID' => '11014884','NAME' => 'Welder,Paul J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '121.000','GPA' => '2.983','EagleMail_ID' => 'P.J.Welder@eagle.clarion.edu'),
    array('ID' => '11014959','NAME' => 'Niedbala,Stacie E','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '126.000','GPA' => '3.649','EagleMail_ID' => 'S.E.Niedbala@eagle.clarion.edu'),
    array('ID' => '11015177','NAME' => 'Lindner,Nicole Samantha','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '122.000','GPA' => '2.809','EagleMail_ID' => 'N.S.Lindner@eagle.clarion.edu'),
    array('ID' => '11015216','NAME' => 'Walentosky,Matthew James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '30.000','GPA' => '3.667','EagleMail_ID' => 'M.J.Walentosky@eagle.clarion.edu'),
    array('ID' => '11015348','NAME' => 'Meyer,Nathan Brian','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '114.000','GPA' => '2.145','EagleMail_ID' => 'N.B.Meyer@eagle.clarion.edu'),
    array('ID' => '11015368','NAME' => 'Shar,Brandon','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '120.000','GPA' => '3.972','EagleMail_ID' => 'B.Shar@eagle.clarion.edu'),
    array('ID' => '11015522','NAME' => 'Boleratz,Kellie Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '122.000','GPA' => '3.752','EagleMail_ID' => 'K.M.Boleratz@eagle.clarion.edu'),
    array('ID' => '11015878','NAME' => 'Tomayko,Matthias James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '133.000','GPA' => '3.766','EagleMail_ID' => 'M.J.Tomayko@eagle.clarion.edu'),
    array('ID' => '11016016','NAME' => 'Hudek,Jordan Andrew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '22.000','GPA' => '0.444','EagleMail_ID' => 'J.A.Hudek@eagle.clarion.edu'),
    array('ID' => '11016087','NAME' => 'Greenawalt,Kelly Sean','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '13.000','GPA' => '2.250','EagleMail_ID' => 'K.S.Greenawalt@eagle.clarion.edu'),
    array('ID' => '11016111','NAME' => 'Eyeson,Angie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '129.000','GPA' => '3.065','EagleMail_ID' => 'A.Eyeson@eagle.clarion.edu'),
    array('ID' => '11016347','NAME' => 'Hendricks,Brittany Nicole','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '128.000','GPA' => '3.234','EagleMail_ID' => 'B.N.Hendricks@eagle.clarion.edu'),
    array('ID' => '11016674','NAME' => 'Thompson,David Scott','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '15.000','GPA' => '2.400','EagleMail_ID' => 'D.S.Thompson@eagle.clarion.edu'),
    array('ID' => '11016922','NAME' => 'Strobel,Zachary William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '130.000','GPA' => '3.885','EagleMail_ID' => 'Z.W.Strobel@eagle.clarion.edu'),
    array('ID' => '11016939','NAME' => 'Miller,Michael Zigmond','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '186.000','GPA' => '4.000','EagleMail_ID' => 'M.Z.Miller@eagle.clarion.edu'),
    array('ID' => '11017027','NAME' => 'Phillips,Derek J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '101.000','GPA' => '1.689','EagleMail_ID' => 'D.J.Phillips@eagle.clarion.edu'),
    array('ID' => '11017243','NAME' => 'Brocious,Daniel Grant','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '120.000','GPA' => '2.924','EagleMail_ID' => 'D.G.Brocious@eagle.clarion.edu'),
    array('ID' => '11017321','NAME' => 'Phillips,Patrick David','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '124.000','GPA' => '3.623','EagleMail_ID' => 'P.D.Phillips@eagle.clarion.edu'),
    array('ID' => '11017371','NAME' => 'Dongilli,Vincent Paul','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '129.000','GPA' => '3.580','EagleMail_ID' => 'V.P.Dongilli@eagle.clarion.edu'),
    array('ID' => '11017430','NAME' => 'Niglio,Ryan Peter','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '122.000','GPA' => '3.533','EagleMail_ID' => 'R.P.Niglio@eagle.clarion.edu'),
    array('ID' => '11017447','NAME' => 'Bonanno,Vincenzo','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '126.000','GPA' => '2.643','EagleMail_ID' => 'V.Bonanno@eagle.clarion.edu'),
    array('ID' => '11017484','NAME' => 'Rocha,Jason Ross','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '122.000','GPA' => '4.000','EagleMail_ID' => 'J.R.Rocha@eagle.clarion.edu'),
    array('ID' => '11017535','NAME' => 'Dixon,Kristi M','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '125.000','GPA' => '3.852','EagleMail_ID' => 'K.M.Dixon@eagle.clarion.edu'),
    array('ID' => '11017848','NAME' => 'Carter,Brandon Isaiah','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '46.000','GPA' => '2.478','EagleMail_ID' => 'B.I.Carter@eagle.clarion.edu'),
    array('ID' => '11017980','NAME' => 'Ross,Joseph Timothy','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '120.000','GPA' => '3.150','EagleMail_ID' => 'J.T.Ross@eagle.clarion.edu'),
    array('ID' => '11018014','NAME' => 'Stephens,David M','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '27.000','GPA' => '3.778','EagleMail_ID' => 'D.M.Stephens@eagle.clarion.edu'),
    array('ID' => '11018162','NAME' => 'Hoffmann,Maximilian','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '32.000','GPA' => '2.682','EagleMail_ID' => 'M.Hoffmann1@eagle.clarion.edu'),
    array('ID' => '11018211','NAME' => 'Sack,Kelsey Erin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '123.000','GPA' => '3.252','EagleMail_ID' => 'K.E.Sack@eagle.clarion.edu'),
    array('ID' => '11018349','NAME' => 'Kephart,Chandler Alan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '133.000','GPA' => '3.316','EagleMail_ID' => 'C.A.Kephart@eagle.clarion.edu'),
    array('ID' => '11018490','NAME' => 'Troup,Donald John','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '27.000','GPA' => '1.467','EagleMail_ID' => 'D.J.Troup@eagle.clarion.edu'),
    array('ID' => '11018772','NAME' => 'Pratt,Michael Ryan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '89.000','GPA' => '1.968','EagleMail_ID' => 'M.R.Pratt@eagle.clarion.edu'),
    array('ID' => '11018834','NAME' => 'Bauer,Michael Jeffrey','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '9.000','GPA' => '0.480','EagleMail_ID' => 'M.J.Bauer2@eagle.clarion.edu'),
    array('ID' => '11018940','NAME' => 'Hull Jr,Larry H','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '103.000','GPA' => '2.826','EagleMail_ID' => 'L.H.Hull@eagle.clarion.edu'),
    array('ID' => '11018984','NAME' => 'Harriger,Kurt Randall','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '155.430','GPA' => '2.703','EagleMail_ID' => 'K.R.Harriger@eagle.clarion.edu'),
    array('ID' => '11018988','NAME' => 'Morris,Brian','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2118','Total' => '12.000','GPA' => '2.000','EagleMail_ID' => 'B.Morris@eagle.clarion.edu'),
    array('ID' => '11019009','NAME' => 'Beers,Lacey','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '158.000','GPA' => '3.090','EagleMail_ID' => 'L.Beers@eagle.clarion.edu'),
    array('ID' => '11019088','NAME' => 'Archie,Tyrone','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '3.296','EagleMail_ID' => 'T.Archie@eagle.clarion.edu'),
    array('ID' => '11019178','NAME' => 'Hawkins Jr,Lance Coady','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '122.000','GPA' => '2.900','EagleMail_ID' => 'L.C.Hawkins@eagle.clarion.edu'),
    array('ID' => '11019240','NAME' => 'Palyas,Chandler London','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2125','Total' => '15.000','GPA' => '2.000','EagleMail_ID' => 'C.L.Palyas@eagle.clarion.edu'),
    array('ID' => '11019282','NAME' => 'Cristini,Nicole Elaine','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '123.000','GPA' => '2.747','EagleMail_ID' => 'N.E.Cristini@eagle.clarion.edu'),
    array('ID' => '11019364','NAME' => 'Northime,Richelle Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '153.500','GPA' => '3.922','EagleMail_ID' => 'R.L.Northime@eagle.clarion.edu'),
    array('ID' => '11019501','NAME' => 'Gallagher I,Christopher Lamar','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '93.000','GPA' => '2.622','EagleMail_ID' => 'C.L.Gallagher@eagle.clarion.edu'),
    array('ID' => '11019935','NAME' => 'Morrow,Matthew P','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '33.000','GPA' => '2.083','EagleMail_ID' => 'M.P.Morrow@eagle.clarion.edu'),
    array('ID' => '11020096','NAME' => 'Gregory,Michele Anthony','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '120.000','GPA' => '2.567','EagleMail_ID' => 'M.A.Gregory1@eagle.clarion.edu'),
    array('ID' => '11020102','NAME' => 'Yarbough-Hoskey,Matthew James','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '46.000','GPA' => '2.957','EagleMail_ID' => 'M.J.Yarboughhoskey@eagle.clarion.edu'),
    array('ID' => '11020603','NAME' => 'Nellis,Brianna Catherine','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '120.000','GPA' => '3.913','EagleMail_ID' => 'B.C.Nellis@eagle.clarion.edu'),
    array('ID' => '11020629','NAME' => 'Deter,Anthony Robert','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '108.000','GPA' => '2.567','EagleMail_ID' => 'A.R.Deter@eagle.clarion.edu'),
    array('ID' => '11020633','NAME' => 'Kern,Paul Henry','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '123.000','GPA' => '2.116','EagleMail_ID' => 'P.H.Kern@eagle.clarion.edu'),
    array('ID' => '11020640','NAME' => 'Aaron,Shianne E','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '125.000','GPA' => '3.328','EagleMail_ID' => 'S.E.Aaron@eagle.clarion.edu'),
    array('ID' => '11020900','NAME' => 'Crockett Jr,Diamond','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '35.000','GPA' => '3.000','EagleMail_ID' => 'D.Crockett@eagle.clarion.edu'),
    array('ID' => '11020919','NAME' => 'Whitmer,Aaron William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '120.000','GPA' => '3.106','EagleMail_ID' => 'A.W.Whitmer@eagle.clarion.edu'),
    array('ID' => '11021113','NAME' => 'Martin,Kenneth Earl','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2135','Total' => '30.000','GPA' => '2.735','EagleMail_ID' => 'K.E.Martin1@eagle.clarion.edu'),
    array('ID' => '11021197','NAME' => 'Hollopeter,Ross D','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '121.000','GPA' => '3.091','EagleMail_ID' => 'R.D.Hollopeter@eagle.clarion.edu'),
    array('ID' => '11021261','NAME' => 'Hall,Allyssa Faith','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '78.000','GPA' => '2.325','EagleMail_ID' => 'A.F.Hall@eagle.clarion.edu'),
    array('ID' => '11021625','NAME' => 'Coleman,Armon Shemar','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '155.000','GPA' => '4.000','EagleMail_ID' => 'A.S.Coleman@eagle.clarion.edu'),
    array('ID' => '11021768','NAME' => 'Bodie,Jason Ross','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '123.000','GPA' => '3.000','EagleMail_ID' => 'J.R.Bodie@eagle.clarion.edu'),
    array('ID' => '11021803','NAME' => 'Bizzarri,Brady Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2175','Total' => '136.000','GPA' => '2.338','EagleMail_ID' => 'B.M.Bizzarri@eagle.clarion.edu'),
    array('ID' => '11021815','NAME' => 'Berry,Nathan Daniel','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '83.000','GPA' => '2.326','EagleMail_ID' => 'N.D.Berry@eagle.clarion.edu'),
    array('ID' => '11021942','NAME' => 'Hoffman,William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '81.000','GPA' => '3.852','EagleMail_ID' => 'W.Hoffman@eagle.clarion.edu'),
    array('ID' => '11021978','NAME' => 'Ramsey,Wyatt Lloyd','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '167.000','GPA' => '3.311','EagleMail_ID' => 'W.L.Ramsey@eagle.clarion.edu'),
    array('ID' => '11021979','NAME' => 'Siebka,Robert William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '123.000','GPA' => '2.333','EagleMail_ID' => 'R.W.Siebka@eagle.clarion.edu'),
    array('ID' => '11021991','NAME' => 'Dorsey,Howard Jordan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '114.000','GPA' => '3.741','EagleMail_ID' => 'H.J.Dorsey@eagle.clarion.edu'),
    array('ID' => '11022148','NAME' => 'Haugh,Thorin Cyrus','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '15.000','GPA' => '1.600','EagleMail_ID' => 'T.C.Haugh@eagle.clarion.edu'),
    array('ID' => '11022158','NAME' => 'Lander,Stuart Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '120.000','GPA' => '3.672','EagleMail_ID' => 'S.A.Lander@eagle.clarion.edu'),
    array('ID' => '11022213','NAME' => 'Switzer,Collin Rae','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '132.000','GPA' => '3.143','EagleMail_ID' => 'C.R.Switzer1@eagle.clarion.edu'),
    array('ID' => '11022362','NAME' => 'Ruscitto,Nicholas Dominic','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '126.000','GPA' => '3.073','EagleMail_ID' => 'N.D.Ruscitto@eagle.clarion.edu'),
    array('ID' => '11022383','NAME' => 'Hovis,Cameron James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '56.000','GPA' => '2.536','EagleMail_ID' => 'C.J.Hovis@eagle.clarion.edu'),
    array('ID' => '11022524','NAME' => 'Curtis,Samuel A','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '137.000','GPA' => '3.176','EagleMail_ID' => 'S.A.Curtis1@eagle.clarion.edu'),
    array('ID' => '11022839','NAME' => 'Clee,Mitchell H','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '173.940','GPA' => '2.650','EagleMail_ID' => 'M.H.Clee@eagle.clarion.edu'),
    array('ID' => '11023031','NAME' => 'Brown,Douglas Anthony','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '134.000','GPA' => '2.954','EagleMail_ID' => 'D.A.Brown@eagle.clarion.edu'),
    array('ID' => '11023035','NAME' => 'Nelson,Anthony Lavon','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '133.000','GPA' => '3.331','EagleMail_ID' => 'A.L.Nelson2@eagle.clarion.edu'),
    array('ID' => '11023072','NAME' => 'Bahorich,Andrew Peter','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '121.000','GPA' => '2.966','EagleMail_ID' => 'A.P.Bahorich@eagle.clarion.edu'),
    array('ID' => '11023100','NAME' => 'Aylesworth,Joe M','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '121.000','GPA' => '4.000','EagleMail_ID' => 'J.M.Aylesworth@eagle.clarion.edu'),
    array('ID' => '11023205','NAME' => 'Canfield,Wyatt Scott','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '123.000','GPA' => '3.793','EagleMail_ID' => 'W.S.Canfield@eagle.clarion.edu'),
    array('ID' => '11023340','NAME' => 'Blackburn,Rachel Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '27.000','GPA' => '2.889','EagleMail_ID' => 'R.L.Blackburn@eagle.clarion.edu'),
    array('ID' => '11023525','NAME' => 'Swistock,James Andrew','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '27.000','GPA' => '2.500','EagleMail_ID' => 'J.A.Swistock@eagle.clarion.edu'),
    array('ID' => '11023618','NAME' => 'Edirisinghe,Dayan Janitha','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '39.000','GPA' => '2.923','EagleMail_ID' => 'D.J.Edirisinghe@eagle.clarion.edu'),
    array('ID' => '11023628','NAME' => 'Jay,Timothy Lawrence','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '137.000','GPA' => '3.416','EagleMail_ID' => 'T.L.Jay@eagle.clarion.edu'),
    array('ID' => '11023937','NAME' => 'Knepp,Slade Ryan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '123.000','GPA' => '3.613','EagleMail_ID' => 'S.R.Knepp@eagle.clarion.edu'),
    array('ID' => '11024017','NAME' => 'Bronstein,Pauline Rochelle','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '150.000','GPA' => '3.779','EagleMail_ID' => 'P.R.Bronstein@eagle.clarion.edu'),
    array('ID' => '11024086','NAME' => 'Raymond,Megan Ann','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '45.000','GPA' => '2.750','EagleMail_ID' => 'M.A.Raymond@eagle.clarion.edu'),
    array('ID' => '11024097','NAME' => 'Johnston,Alexander Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '6.000','GPA' => '0.500','EagleMail_ID' => 'A.T.Johnston@eagle.clarion.edu'),
    array('ID' => '11024162','NAME' => 'Obusek I,Joseph Ernest','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '130.000','GPA' => '1.630','EagleMail_ID' => 'J.E.Obusek@eagle.clarion.edu'),
    array('ID' => '11024237','NAME' => 'Rice,Jacob P','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '37.000','GPA' => '1.161','EagleMail_ID' => 'J.P.Rice@eagle.clarion.edu'),
    array('ID' => '11024313','NAME' => 'Wilson,Christopher Scott','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '124.000','GPA' => '3.144','EagleMail_ID' => 'C.S.Wilson1@eagle.clarion.edu'),
    array('ID' => '11024439','NAME' => 'McCoy,Andrew Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '50.000','GPA' => '3.360','EagleMail_ID' => 'A.E.Mccoy@eagle.clarion.edu'),
    array('ID' => '11024441','NAME' => 'Warner,David','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '121.000','GPA' => '3.861','EagleMail_ID' => 'D.Warner@eagle.clarion.edu'),
    array('ID' => '11024486','NAME' => 'Chatley,Dakota Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '24.000','GPA' => '1.462','EagleMail_ID' => 'D.T.Chatley@eagle.clarion.edu'),
    array('ID' => '11024560','NAME' => 'Stefanik,Tyler Francis','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '121.000','GPA' => '3.284','EagleMail_ID' => 'T.F.Stefanik@eagle.clarion.edu'),
    array('ID' => '11024685','NAME' => 'Patterson,Jake Allen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '50.000','GPA' => '1.943','EagleMail_ID' => 'J.A.Patterson@eagle.clarion.edu'),
    array('ID' => '11024691','NAME' => 'Walls,Frank','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '32.000','GPA' => '1.722','EagleMail_ID' => 'F.Walls@eagle.clarion.edu'),
    array('ID' => '11024714','NAME' => 'Zoeller,Benjamin David','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '18.000','GPA' => '1.333','EagleMail_ID' => 'B.D.Zoeller@eagle.clarion.edu'),
    array('ID' => '11024718','NAME' => 'Crowley,Nathaniel Sebastian','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '126.000','GPA' => '3.545','EagleMail_ID' => 'N.S.Crowley@eagle.clarion.edu'),
    array('ID' => '11024787','NAME' => 'Barbary,Alayne Grace','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '23.000','GPA' => '1.136','EagleMail_ID' => 'A.G.Barbary@eagle.clarion.edu'),
    array('ID' => '11024864','NAME' => 'Weaver,Ryan D','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2128','Total' => '15.000','GPA' => '1.600','EagleMail_ID' => 'R.D.Weaver@eagle.clarion.edu'),
    array('ID' => '11024918','NAME' => 'Joyner,Jeffrey Tyrell','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '121.000','GPA' => '2.826','EagleMail_ID' => 'J.T.Joyner@eagle.clarion.edu'),
    array('ID' => '11024927','NAME' => 'Dunleavy,Joshua Alexander','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '91.000','GPA' => '4.000','EagleMail_ID' => 'J.A.Dunleavy@eagle.clarion.edu'),
    array('ID' => '11025192','NAME' => 'Oknefski,Maxwell P','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '30.000','GPA' => '4.000','EagleMail_ID' => 'M.P.Oknefski@eagle.clarion.edu'),
    array('ID' => '11025393','NAME' => 'Hogg,Catherine E','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '52.000','GPA' => '2.044','EagleMail_ID' => 'C.E.Hogg@eagle.clarion.edu'),
    array('ID' => '11025520','NAME' => 'Wolbert,Sarah Anne','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '85.000','GPA' => '3.946','EagleMail_ID' => 'S.A.Wolbert@eagle.clarion.edu'),
    array('ID' => '11025855','NAME' => 'Armagost,Evan Richard','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2175','Total' => '124.000','GPA' => '3.065','EagleMail_ID' => 'E.R.Armagost@eagle.clarion.edu'),
    array('ID' => '11025931','NAME' => 'Rose,Acacia Renaye','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '74.000','GPA' => '4.000','EagleMail_ID' => 'A.R.Rose@eagle.clarion.edu'),
    array('ID' => '11025980','NAME' => 'Taylor,Heath Ellsworth','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '66.000','GPA' => '2.855','EagleMail_ID' => 'H.E.Taylor@eagle.clarion.edu'),
    array('ID' => '11026031','NAME' => 'Maxwell,Evan Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '161.000','GPA' => '3.519','EagleMail_ID' => 'E.T.Maxwell@eagle.clarion.edu'),
    array('ID' => '11026151','NAME' => 'McCosby,Ethan Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '134.000','GPA' => '3.536','EagleMail_ID' => 'E.M.Mccosby@eagle.clarion.edu'),
    array('ID' => '11026182','NAME' => 'Lachnicht,William James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '123.000','GPA' => '3.195','EagleMail_ID' => 'W.J.Lachnicht@eagle.clarion.edu'),
    array('ID' => '11026208','NAME' => 'Endicott,Benjamin Scott','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '137.000','GPA' => '2.961','EagleMail_ID' => 'B.S.Endicott@eagle.clarion.edu'),
    array('ID' => '11026364','NAME' => 'Thomas,Dakota Patrick','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'D.P.Thomas1@eagle.clarion.edu'),
    array('ID' => '11026473','NAME' => 'Hoover,Shawn Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '139.000','GPA' => '3.800','EagleMail_ID' => 'S.M.Hoover2@eagle.clarion.edu'),
    array('ID' => '11026480','NAME' => 'Best,William Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '125.000','GPA' => '2.712','EagleMail_ID' => 'W.M.Best@eagle.clarion.edu'),
    array('ID' => '11026752','NAME' => 'Yount,Mark Russell','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '69.000','GPA' => '2.375','EagleMail_ID' => 'M.R.Yount@eagle.clarion.edu'),
    array('ID' => '11026819','NAME' => 'Spencer,Zachary Edwin','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '141.000','GPA' => '2.667','EagleMail_ID' => 'Z.E.Spencer@eagle.clarion.edu'),
    array('ID' => '11027313','NAME' => 'Wurster,Kenneth Daniel Smith','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '78.000','GPA' => '2.269','EagleMail_ID' => 'K.D.Wurster@eagle.clarion.edu'),
    array('ID' => '11027392','NAME' => 'Mastrian,Dominic','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '51.000','GPA' => '2.421','EagleMail_ID' => 'D.Mastrian@eagle.clarion.edu'),
    array('ID' => '11027486','NAME' => 'Bredl,John Erik','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '135.000','GPA' => '3.844','EagleMail_ID' => 'J.E.Bredl@eagle.clarion.edu'),
    array('ID' => '11027739','NAME' => 'Moore,Zalika Karyn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2175','Total' => '120.000','GPA' => '2.645','EagleMail_ID' => 'Z.K.Moore1@eagle.clarion.edu'),
    array('ID' => '11027755','NAME' => 'Pellow,Jonathan C','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '137.000','GPA' => '3.555','EagleMail_ID' => 'J.C.Pellow@eagle.clarion.edu'),
    array('ID' => '11027787','NAME' => 'Vigus,Trey Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '91.000','GPA' => '2.806','EagleMail_ID' => 'T.M.Vigus@eagle.clarion.edu'),
    array('ID' => '11027823','NAME' => 'Baker,Garret Francis','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '147.000','GPA' => '3.979','EagleMail_ID' => 'G.F.Baker@eagle.clarion.edu'),
    array('ID' => '11028036','NAME' => 'O\'Donnell,David Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2149','Total' => '39.000','GPA' => '3.231','EagleMail_ID' => 'D.M.Odonnell@eagle.clarion.edu'),
    array('ID' => '11028275','NAME' => 'Lesko,Dalton James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '15.000','GPA' => '3.000','EagleMail_ID' => 'D.J.Lesko@eagle.clarion.edu'),
    array('ID' => '11028330','NAME' => 'Gallaher,Brian James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '120.000','GPA' => '3.925','EagleMail_ID' => 'B.J.Gallaher@eagle.clarion.edu'),
    array('ID' => '11028475','NAME' => 'Saline,Justin Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '121.000','GPA' => '3.314','EagleMail_ID' => 'J.M.Saline@eagle.clarion.edu'),
    array('ID' => '11028661','NAME' => 'Shaffer,Chad Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '135.000','GPA' => '3.179','EagleMail_ID' => 'C.M.Shaffer@eagle.clarion.edu'),
    array('ID' => '11028779','NAME' => 'Heasley,Douglas Samuel','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '128.000','GPA' => '3.797','EagleMail_ID' => 'D.S.Heasley@eagle.clarion.edu'),
    array('ID' => '11028787','NAME' => 'Killian,Michael James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'M.J.Killian@eagle.clarion.edu'),
    array('ID' => '11028891','NAME' => 'Shuttleworth,Heidi-Jo Rose','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '121.000','GPA' => '4.000','EagleMail_ID' => 'H.R.Shuttleworth@eagle.clarion.edu'),
    array('ID' => '11028894','NAME' => 'Callender,Ashley','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '19.000','GPA' => '1.258','EagleMail_ID' => 'A.Callender@eagle.clarion.edu'),
    array('ID' => '11028907','NAME' => 'Thomas,Amanda Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '6.000','GPA' => '0.250','EagleMail_ID' => 'A.L.Thomas3@eagle.clarion.edu'),
    array('ID' => '11028949','NAME' => 'Ferguson,Erin Rebecca','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '42.000','GPA' => '1.588','EagleMail_ID' => 'E.R.Ferguson@eagle.clarion.edu'),
    array('ID' => '11029001','NAME' => 'Carfang,Kristen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2159','Total' => '82.000','GPA' => '3.074','EagleMail_ID' => 'K.Carfang@eagle.clarion.edu'),
    array('ID' => '11029170','NAME' => 'Wallace,Nuwh I','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '52.000','GPA' => '4.000','EagleMail_ID' => 'N.I.Wallace@eagle.clarion.edu'),
    array('ID' => '11029303','NAME' => 'Trinclisti,Tyler Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '30.000','GPA' => '2.828','EagleMail_ID' => 'T.L.Trinclisti@eagle.clarion.edu'),
    array('ID' => '11029311','NAME' => 'Wilson Jr,Wayne Andrew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '142.000','GPA' => '2.872','EagleMail_ID' => 'W.A.Wilson@eagle.clarion.edu'),
    array('ID' => '11029442','NAME' => 'Frazier,Casey','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '144.000','GPA' => '3.247','EagleMail_ID' => 'C.Frazier@eagle.clarion.edu'),
    array('ID' => '11029573','NAME' => 'McMillin,Robert D','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '64.000','GPA' => '2.349','EagleMail_ID' => 'R.D.Mcmillin@eagle.clarion.edu'),
    array('ID' => '11029604','NAME' => 'Fagan,Sean Taylor','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '9.000','GPA' => '1.600','EagleMail_ID' => 'S.T.Fagan@eagle.clarion.edu'),
    array('ID' => '11029705','NAME' => 'Briggs,Craig','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '120.000','GPA' => '2.583','EagleMail_ID' => 'C.Briggs@eagle.clarion.edu'),
    array('ID' => '11029707','NAME' => 'Ellinger,Kade Mark','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '156.000','GPA' => '2.373','EagleMail_ID' => 'K.M.Ellinger@eagle.clarion.edu'),
    array('ID' => '11029763','NAME' => 'De Souza Oliveira,Geison','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '3.575','EagleMail_ID' => 'G.Desouzaoliveira@eagle.clarion.edu'),
    array('ID' => '11029843','NAME' => 'Kearney,Tiffany Marie','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '87.000','GPA' => '1.852','EagleMail_ID' => 'T.M.Kearney@eagle.clarion.edu'),
    array('ID' => '11029861','NAME' => 'Speer Jr,Thomas Richard','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '147.000','GPA' => '3.672','EagleMail_ID' => 'T.R.Speer@eagle.clarion.edu'),
    array('ID' => '11030007','NAME' => 'Ball,Jocelyn Keyona','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '75.000','GPA' => '3.000','EagleMail_ID' => 'J.K.Ball@eagle.clarion.edu'),
    array('ID' => '11030064','NAME' => 'Mason,Michael Brandon','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '122.000','GPA' => '3.000','EagleMail_ID' => 'M.B.Mason1@eagle.clarion.edu'),
    array('ID' => '11030091','NAME' => 'Akins,Cameron John','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2179','Total' => '112.000','GPA' => '2.623','EagleMail_ID' => 'C.J.Akins@eagle.clarion.edu'),
    array('ID' => '11030370','NAME' => 'Matotek,Nicholas Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '152.000','GPA' => '3.845','EagleMail_ID' => 'N.E.Matotek@eagle.clarion.edu'),
    array('ID' => '11030581','NAME' => 'Snelick,Austin Robert','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '87.000','GPA' => '2.440','EagleMail_ID' => 'A.R.Snelick@eagle.clarion.edu'),
    array('ID' => '11030628','NAME' => 'Kissick,Charles','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '59.000','GPA' => '3.071','EagleMail_ID' => 'C.Kissick@eagle.clarion.edu'),
    array('ID' => '11030722','NAME' => 'Couser,Ashley Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '28.000','GPA' => '3.071','EagleMail_ID' => 'A.M.Couser@eagle.clarion.edu'),
    array('ID' => '11030960','NAME' => 'Francois,Lance Emmanuel','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2131','Total' => '114.000','GPA' => '3.000','EagleMail_ID' => 'L.E.Francois@eagle.clarion.edu'),
    array('ID' => '11031023','NAME' => 'Cumpston,Richard James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '120.000','GPA' => '2.873','EagleMail_ID' => 'R.J.Cumpston@eagle.clarion.edu'),
    array('ID' => '11031220','NAME' => 'Sollenberger,Lyza Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '15.000','GPA' => '1.222','EagleMail_ID' => 'L.M.Sollenberger@eagle.clarion.edu'),
    array('ID' => '11031288','NAME' => 'Labarge,Timothy Micheal','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '22.000','GPA' => '1.375','EagleMail_ID' => 'T.M.Labarge@eagle.clarion.edu'),
    array('ID' => '11031543','NAME' => 'Cyphert,Troy Mason','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '3.000','GPA' => '0.400','EagleMail_ID' => 'T.M.Cyphert1@eagle.clarion.edu'),
    array('ID' => '11032087','NAME' => 'Venesky,Paul William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '67.000','GPA' => '2.975','EagleMail_ID' => 'P.W.Venesky@eagle.clarion.edu'),
    array('ID' => '11032275','NAME' => 'Hefter,Zachary David','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '66.000','GPA' => '3.682','EagleMail_ID' => 'Z.D.Hefter@eagle.clarion.edu'),
    array('ID' => '11032503','NAME' => 'Erich,Zachary Alan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '13.000','GPA' => '3.000','EagleMail_ID' => 'Z.A.Erich@eagle.clarion.edu'),
    array('ID' => '11032552','NAME' => 'Strine,Tara Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '63.000','GPA' => '2.372','EagleMail_ID' => 'T.M.Strine@eagle.clarion.edu'),
    array('ID' => '11032688','NAME' => 'Siger,Brad C','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '39.000','GPA' => '1.733','EagleMail_ID' => 'B.C.Siger1@eagle.clarion.edu'),
    array('ID' => '11032916','NAME' => 'Glover,Tucker Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '58.000','GPA' => '3.222','EagleMail_ID' => 'T.T.Glover@eagle.clarion.edu'),
    array('ID' => '11032934','NAME' => 'Hetrick,Caleb Wade','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '60.000','GPA' => '2.100','EagleMail_ID' => 'C.W.Hetrick1@eagle.clarion.edu'),
    array('ID' => '11032974','NAME' => 'Stackhouse,Dustin R','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '133.000','GPA' => '2.522','EagleMail_ID' => 'D.R.Stackhouse@eagle.clarion.edu'),
    array('ID' => '11033070','NAME' => 'Barger,Austin Jacob','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '122.000','GPA' => '3.267','EagleMail_ID' => 'A.J.Barger@eagle.clarion.edu'),
    array('ID' => '11033094','NAME' => 'Grafton,Zachary C','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '121.000','GPA' => '3.281','EagleMail_ID' => 'Z.C.Grafton@eagle.clarion.edu'),
    array('ID' => '11033191','NAME' => 'Probst,Allison Renee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '101.000','GPA' => '1.757','EagleMail_ID' => 'A.R.Probst@eagle.clarion.edu'),
    array('ID' => '11033241','NAME' => 'Sutton,William Richard','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '109.000','GPA' => '2.696','EagleMail_ID' => 'W.R.Sutton@eagle.clarion.edu'),
    array('ID' => '11033245','NAME' => 'Scott,Janaya Renee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2185','Total' => '100.000','GPA' => '2.900','EagleMail_ID' => 'J.R.Scott@eagle.clarion.edu'),
    array('ID' => '11033324','NAME' => 'Koch,Gina M','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '148.000','GPA' => '3.293','EagleMail_ID' => 'G.M.Shero@eagle.clarion.edu'),
    array('ID' => '11033353','NAME' => 'Dunkerley,John Robert','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '126.000','GPA' => '1.837','EagleMail_ID' => 'J.R.Dunkerley@eagle.clarion.edu'),
    array('ID' => '11033394','NAME' => 'Welch,James Philip','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '121.000','GPA' => '2.842','EagleMail_ID' => 'J.P.Welch@eagle.clarion.edu'),
    array('ID' => '11033515','NAME' => 'Chapman,Matthew Donald','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '118.000','GPA' => '2.940','EagleMail_ID' => 'M.D.Chapman@eagle.clarion.edu'),
    array('ID' => '11033524','NAME' => 'Schneider,Joshua Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '91.000','GPA' => '3.275','EagleMail_ID' => 'J.L.Schneider@eagle.clarion.edu'),
    array('ID' => '11033883','NAME' => 'Lehman,Kenneth J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2138','Total' => '24.000','GPA' => '3.500','EagleMail_ID' => 'K.J.Lehman@eagle.clarion.edu'),
    array('ID' => '11034151','NAME' => 'Siegel,Jerremy Steven','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '131.000','GPA' => '3.412','EagleMail_ID' => 'J.S.Siegel1@eagle.clarion.edu'),
    array('ID' => '11034374','NAME' => 'Barnes,Alexander Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '3.845','EagleMail_ID' => 'A.T.Barnes@eagle.clarion.edu'),
    array('ID' => '11034376','NAME' => 'Tonks,Cassidy Aron','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '166.000','GPA' => '3.143','EagleMail_ID' => 'C.A.Tonks@eagle.clarion.edu'),
    array('ID' => '11034399','NAME' => 'Maynard,Megan Rose','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '3.471','EagleMail_ID' => 'M.R.Maynard@eagle.clarion.edu'),
    array('ID' => '11034403','NAME' => 'Ferguson,Scott James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '135.000','GPA' => '3.741','EagleMail_ID' => 'S.J.Ferguson@eagle.clarion.edu'),
    array('ID' => '11034965','NAME' => 'Disalvo,Jonathan Andrew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '68.000','GPA' => '1.962','EagleMail_ID' => 'J.A.Disalvo@eagle.clarion.edu'),
    array('ID' => '11035028','NAME' => 'Lindsey,Alan','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '3.025','EagleMail_ID' => 'A.Lindsey@eagle.clarion.edu'),
    array('ID' => '11035051','NAME' => 'Tarr,Anthony B','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '4.000','GPA' => '0.269','EagleMail_ID' => 'A.B.Tarr@eagle.clarion.edu'),
    array('ID' => '11035225','NAME' => 'Schantz,Jordan C','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '75.000','GPA' => '3.040','EagleMail_ID' => 'J.C.Schantz@eagle.clarion.edu'),
    array('ID' => '11035287','NAME' => 'Shinde,Abhijit Arvind','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '27.000','GPA' => '2.100','EagleMail_ID' => 'A.A.Shinde1@eagle.clarion.edu'),
    array('ID' => '11035361','NAME' => 'Shepler,Caroline','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '3.000','GPA' => '0.500','EagleMail_ID' => 'C.J.Shepler1@eagle.clarion.edu'),
    array('ID' => '11035939','NAME' => 'Grady III,Charles Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2185','Total' => '118.000','GPA' => '3.238','EagleMail_ID' => 'C.E.Gradyiii@eagle.clarion.edu'),
    array('ID' => '11036009','NAME' => 'Gulya,Abigail K','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '18.000','GPA' => '1.300','EagleMail_ID' => 'A.K.Gulya@eagle.clarion.edu'),
    array('ID' => '11036014','NAME' => 'Robertson,Ryan Kristopher','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '39.000','GPA' => '1.672','EagleMail_ID' => 'R.K.Robertson@eagle.clarion.edu'),
    array('ID' => '11036034','NAME' => 'Wolfgang,Stacy Ellen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '3.775','EagleMail_ID' => 'S.E.Wolfgang@eagle.clarion.edu'),
    array('ID' => '11036051','NAME' => 'Gatto,Leah Angelina','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '122.000','GPA' => '3.000','EagleMail_ID' => 'L.A.Gatto@eagle.clarion.edu'),
    array('ID' => '11036071','NAME' => 'Tauqeer,Usman','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '120.000','GPA' => '3.586','EagleMail_ID' => 'U.Tauqeer@eagle.clarion.edu'),
    array('ID' => '11036091','NAME' => 'Rosenthal,Mary R','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '18.000','GPA' => '1.273','EagleMail_ID' => 'M.R.Rosenthal@eagle.clarion.edu'),
    array('ID' => '11036104','NAME' => 'Bailey,Rebecca Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '98.000','GPA' => '3.798','EagleMail_ID' => 'R.L.Bailey@eagle.clarion.edu'),
    array('ID' => '11036110','NAME' => 'Beck,Joshua Gregory','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '45.000','GPA' => '3.900','EagleMail_ID' => 'J.G.Beck@eagle.clarion.edu'),
    array('ID' => '11036330','NAME' => 'Dubia,Joshua Stephen','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '126.000','GPA' => '3.153','EagleMail_ID' => 'J.S.Dubia@eagle.clarion.edu'),
    array('ID' => '11036395','NAME' => 'Hufnagel,Jordan Daniel','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '108.000','GPA' => '3.722','EagleMail_ID' => 'J.D.Hufnagel@eagle.clarion.edu'),
    array('ID' => '11036422','NAME' => 'Johnson,Shelby Elizabeth','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '113.000','GPA' => '3.026','EagleMail_ID' => 'S.E.Johnson1@eagle.clarion.edu'),
    array('ID' => '11036445','NAME' => 'Sampson,Jonah Jack','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '144.000','GPA' => '3.410','EagleMail_ID' => 'J.J.Sampson@eagle.clarion.edu'),
    array('ID' => '11036638','NAME' => 'Cauchon,Zachary J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '2.583','EagleMail_ID' => 'Z.J.Cauchon@eagle.clarion.edu'),
    array('ID' => '11036731','NAME' => 'Greggs,Breanna Mei','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '123.000','GPA' => '3.613','EagleMail_ID' => 'B.M.Greggs@eagle.clarion.edu'),
    array('ID' => '11036867','NAME' => 'Miller,Matthew Joseph','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '93.000','GPA' => '1.858','EagleMail_ID' => 'M.J.Miller1@eagle.clarion.edu'),
    array('ID' => '11037063','NAME' => 'Packard,Brandon Tyler','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2175','Total' => '120.000','GPA' => '2.607','EagleMail_ID' => 'B.T.Packard@eagle.clarion.edu'),
    array('ID' => '11037089','NAME' => 'Skemp,Jordan Thomas','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '106.000','GPA' => '2.550','EagleMail_ID' => 'J.T.Skemp@eagle.clarion.edu'),
    array('ID' => '11037092','NAME' => 'Black,Evan Parker','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '107.000','GPA' => '2.944','EagleMail_ID' => 'E.P.Black@eagle.clarion.edu'),
    array('ID' => '11037181','NAME' => 'Ippolito,Anthony Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'A.M.Ippolito@eagle.clarion.edu'),
    array('ID' => '11037370','NAME' => 'Lyons,Timothy John','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '120.000','GPA' => '3.772','EagleMail_ID' => 'T.J.Lyons@eagle.clarion.edu'),
    array('ID' => '11037374','NAME' => 'Allen,Andrew J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '12.000','GPA' => '1.000','EagleMail_ID' => 'A.J.Allen1@eagle.clarion.edu'),
    array('ID' => '11037390','NAME' => 'Pontious,Renee Susanne','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '89.000','GPA' => '1.920','EagleMail_ID' => 'R.S.Pontious@eagle.clarion.edu'),
    array('ID' => '11037455','NAME' => 'Pollick,Anthony Chhum','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '58.000','GPA' => '3.534','EagleMail_ID' => 'A.C.Pollick@eagle.clarion.edu'),
    array('ID' => '11037511','NAME' => 'Briggs,Joshua John','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '4.000','EagleMail_ID' => 'J.J.Briggs@eagle.clarion.edu'),
    array('ID' => '11037681','NAME' => 'Koch,Kristopher','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '104.000','GPA' => '2.701','EagleMail_ID' => 'K.Koch@eagle.clarion.edu'),
    array('ID' => '11037821','NAME' => 'Morelli,Anthony Oliver','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '106.000','GPA' => '2.087','EagleMail_ID' => 'A.O.Morelli@eagle.clarion.edu'),
    array('ID' => '11037970','NAME' => 'Brown,Kegan Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '30.000','GPA' => '2.100','EagleMail_ID' => 'K.M.Brown4@eagle.clarion.edu'),
    array('ID' => '11038158','NAME' => 'Weaver,Cameron Gage','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '132.000','GPA' => '4.000','EagleMail_ID' => 'C.G.Weaver@eagle.clarion.edu'),
    array('ID' => '11038171','NAME' => 'Scholl,Devin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '2.492','EagleMail_ID' => 'D.Scholl@eagle.clarion.edu'),
    array('ID' => '11038172','NAME' => 'Leech,Benjamin Bradley','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '120.000','GPA' => '3.193','EagleMail_ID' => 'B.B.Leech@eagle.clarion.edu'),
    array('ID' => '11038194','NAME' => 'Gillis,Christopher','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '99.000','GPA' => '3.100','EagleMail_ID' => 'C.Gillis@eagle.clarion.edu'),
    array('ID' => '11038258','NAME' => 'Hinton,Lorri Ann','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '33.000','GPA' => '3.719','EagleMail_ID' => 'L.A.Hinton@eagle.clarion.edu'),
    array('ID' => '11038320','NAME' => 'Wenner,Kyle Andrew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '123.000','GPA' => '3.025','EagleMail_ID' => 'K.A.Wenner@eagle.clarion.edu'),
    array('ID' => '11038443','NAME' => 'Armstrong,Jesse Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '162.000','GPA' => '3.172','EagleMail_ID' => 'J.L.Armstrong@eagle.clarion.edu'),
    array('ID' => '11038625','NAME' => 'White,Aaron E','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '65.000','GPA' => '3.196','EagleMail_ID' => 'A.E.White1@eagle.clarion.edu'),
    array('ID' => '11038747','NAME' => 'Lightner,Alyssa Michelle','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '57.000','GPA' => '0.462','EagleMail_ID' => 'A.M.Lightner@eagle.clarion.edu'),
    array('ID' => '11038801','NAME' => 'O\'Donnell,Jon Louis','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '24.000','GPA' => '3.125','EagleMail_ID' => 'J.L.ODonnell@eagle.clarion.edu'),
    array('ID' => '11038895','NAME' => 'Shields,Taylor Alexander','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '28.000','GPA' => '2.839','EagleMail_ID' => 'T.A.Shields@eagle.clarion.edu'),
    array('ID' => '11038938','NAME' => 'Wenner,Allison Leigh','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '27.000','GPA' => '1.000','EagleMail_ID' => 'A.L.Wenner@eagle.clarion.edu'),
    array('ID' => '11039088','NAME' => 'Csorba,Thomas L.','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '183.000','GPA' => '1.960','EagleMail_ID' => 'T.L.Csorba@eagle.clarion.edu'),
    array('ID' => '11039106','NAME' => 'Miholics,Logan Alexander','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '21.000','GPA' => '1.645','EagleMail_ID' => 'L.A.Miholics@eagle.clarion.edu'),
    array('ID' => '11039140','NAME' => 'Wilson,Danielle L','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '114.000','GPA' => '3.968','EagleMail_ID' => 'D.L.Wilson@eagle.clarion.edu'),
    array('ID' => '11039149','NAME' => 'Florence,Scott Lemuel','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '48.000','GPA' => '1.750','EagleMail_ID' => 'S.L.Florence@eagle.clarion.edu'),
    array('ID' => '11039303','NAME' => 'Gibson,Crista E','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2148','Total' => '1.000','GPA' => '0.000','EagleMail_ID' => 'C.E.Gibson@eagle.clarion.edu'),
    array('ID' => '11039372','NAME' => 'Ruth,Christopher','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '35.000','GPA' => '2.613','EagleMail_ID' => 'C.Ruth@eagle.clarion.edu'),
    array('ID' => '11039636','NAME' => 'Girard,Mackenzie Scott Neal','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2178','Total' => '124.000','GPA' => '2.874','EagleMail_ID' => 'M.S.Girard@eagle.clarion.edu'),
    array('ID' => '11039847','NAME' => 'MacNamara,Drew William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '59.000','GPA' => '3.390','EagleMail_ID' => 'D.W.MacNamara@eagle.clarion.edu'),
    array('ID' => '11039857','NAME' => 'Roxby,Andrew W','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '22.000','GPA' => '3.227','EagleMail_ID' => 'A.W.Roxby@eagle.clarion.edu'),
    array('ID' => '11039877','NAME' => 'Stevens,Joseph Robert','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '124.670','GPA' => '3.117','EagleMail_ID' => 'J.R.Stevens@eagle.clarion.edu'),
    array('ID' => '11040145','NAME' => 'Armstrong III,Joseph C','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '76.000','GPA' => '3.955','EagleMail_ID' => 'J.C.Armstrong@eagle.clarion.edu'),
    array('ID' => '11040199','NAME' => 'Whitehouse,Nathan Cory','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '33.000','GPA' => '1.333','EagleMail_ID' => 'N.C.Whitehouse@eagle.clarion.edu'),
    array('ID' => '11040339','NAME' => 'Oakes,Austin Blake','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '79.000','GPA' => '3.077','EagleMail_ID' => 'A.B.Oakes@eagle.clarion.edu'),
    array('ID' => '11040552','NAME' => 'Bell,Donald Ewing','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '3.310','EagleMail_ID' => 'D.E.Bell@eagle.clarion.edu'),
    array('ID' => '11040560','NAME' => 'Kenney,William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '58.000','GPA' => '1.952','EagleMail_ID' => 'W.Kenney@eagle.clarion.edu'),
    array('ID' => '11040710','NAME' => 'Morrow,Samuel Glenn','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '117.000','GPA' => '3.969','EagleMail_ID' => 'S.G.Morrow@eagle.clarion.edu'),
    array('ID' => '11040793','NAME' => 'Devries,Jeff','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '116.000','GPA' => '3.500','EagleMail_ID' => 'J.Devries@eagle.clarion.edu'),
    array('ID' => '11040798','NAME' => 'McClellan,Matthew J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'M.J.McClellan@eagle.clarion.edu'),
    array('ID' => '11040901','NAME' => 'Roth,Nathan William','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '85.000','GPA' => '2.461','EagleMail_ID' => 'N.W.Roth@eagle.clarion.edu'),
    array('ID' => '11040987','NAME' => 'Fabiszewski,Eric','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '89.000','GPA' => '2.652','EagleMail_ID' => 'E.Fabiszewski@eagle.clarion.edu'),
    array('ID' => '11041012','NAME' => 'Frye,Samantha Jo','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '3.354','EagleMail_ID' => 'S.J.Frye@eagle.clarion.edu'),
    array('ID' => '11041024','NAME' => 'Ramsey,Landon Arthur','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '36.000','GPA' => '2.475','EagleMail_ID' => 'L.A.Ramsey@eagle.clarion.edu'),
    array('ID' => '11041107','NAME' => 'Mumma,Brett Alan','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '85.000','GPA' => '3.493','EagleMail_ID' => 'B.A.Mumma@eagle.clarion.edu'),
    array('ID' => '11041258','NAME' => 'Delawrence,James Andrew','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '86.000','GPA' => '3.128','EagleMail_ID' => 'J.A.Delawrence@eagle.clarion.edu'),
    array('ID' => '11041378','NAME' => 'Malloy,Andrew Stuart','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '78.000','GPA' => '2.974','EagleMail_ID' => 'A.S.Malloy@eagle.clarion.edu'),
    array('ID' => '11041611','NAME' => 'Skidmore,Braden William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2165','Total' => '39.000','GPA' => '3.333','EagleMail_ID' => 'B.W.Skidmore@eagle.clarion.edu'),
    array('ID' => '11041671','NAME' => 'Nicholes,Sierra Kaitlin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '53.000','GPA' => '3.774','EagleMail_ID' => 'S.K.Nicholes@eagle.clarion.edu'),
    array('ID' => '11042095','NAME' => 'Conrad,Philip Raymon','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '115.000','GPA' => '3.775','EagleMail_ID' => 'P.R.Conrad@eagle.clarion.edu'),
    array('ID' => '11042110','NAME' => 'Lucas,Sarah Eileen','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '103.000','GPA' => '3.883','EagleMail_ID' => 'S.E.Lucas@eagle.clarion.edu'),
    array('ID' => '11042121','NAME' => 'Aljafen,Abdulrahman Fahad','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '109.000','GPA' => '3.853','EagleMail_ID' => 'A.F.Aljafen@eagle.clarion.edu'),
    array('ID' => '11042232','NAME' => 'McQuiston,Kari Elizabeth','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '72.000','GPA' => '2.917','EagleMail_ID' => 'K.E.Mcquiston@eagle.clarion.edu'),
    array('ID' => '11042268','NAME' => 'McKenna,James Patrick','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '90.000','GPA' => '3.400','EagleMail_ID' => 'J.P.McKenna@eagle.clarion.edu'),
    array('ID' => '11042270','NAME' => 'Onofrey,Justin','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '100.000','GPA' => '3.733','EagleMail_ID' => 'J.Onofrey@eagle.clarion.edu'),
    array('ID' => '11042416','NAME' => 'Bowley,Nathan Curtis','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '8.000','GPA' => '1.545','EagleMail_ID' => 'N.C.Bowley@eagle.clarion.edu'),
    array('ID' => '11042515','NAME' => 'Horner,Zachary','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '77.000','GPA' => '2.105','EagleMail_ID' => 'Z.Horner@eagle.clarion.edu'),
    array('ID' => '11043281','NAME' => 'Broussard,Zachary Michael','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '91.000','GPA' => '2.442','EagleMail_ID' => 'Z.M.Broussard1@eagle.clarion.edu'),
    array('ID' => '11043359','NAME' => 'Nelen,Brandon Michael','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '92.000','GPA' => '3.870','EagleMail_ID' => 'B.M.Nelen@eagle.clarion.edu'),
    array('ID' => '11043368','NAME' => 'Demor,Kristina Leigh','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'K.L.Demor@eagle.clarion.edu'),
    array('ID' => '11043377','NAME' => 'Troup,Madison P','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'M.P.Troup@eagle.clarion.edu'),
    array('ID' => '11043385','NAME' => 'Papson,Jonathan','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '90.000','GPA' => '3.310','EagleMail_ID' => 'J.Papson@eagle.clarion.edu'),
    array('ID' => '11043519','NAME' => 'Hargenrader,Gregory Michael','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '87.000','GPA' => '3.103','EagleMail_ID' => 'G.M.Hargenrader@eagle.clarion.edu'),
    array('ID' => '11043594','NAME' => 'Smith,Kaleb','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '46.000','GPA' => '1.750','EagleMail_ID' => 'K.Smith@eagle.clarion.edu'),
    array('ID' => '11043599','NAME' => 'Barnes,Jacob Andrew','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '99.000','GPA' => '4.000','EagleMail_ID' => 'J.A.Barnes@eagle.clarion.edu'),
    array('ID' => '11043625','NAME' => 'McClaine,Luke','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '15.000','GPA' => '2.200','EagleMail_ID' => 'L.McClaine@eagle.clarion.edu'),
    array('ID' => '11043724','NAME' => 'Zawacki,Jared Daniel','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '97.000','GPA' => '2.938','EagleMail_ID' => 'J.D.Zawacki@eagle.clarion.edu'),
    array('ID' => '11043740','NAME' => 'Best,Allen Scott','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '79.000','GPA' => '3.857','EagleMail_ID' => 'A.S.Best@eagle.clarion.edu'),
    array('ID' => '11043930','NAME' => 'Manny,Jeremy Jay','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '84.000','GPA' => '2.964','EagleMail_ID' => 'J.J.Manny@eagle.clarion.edu'),
    array('ID' => '11044139','NAME' => 'Kelly,Anthony Joseph','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '91.000','GPA' => '2.945','EagleMail_ID' => 'A.J.Kelly@eagle.clarion.edu'),
    array('ID' => '11044204','NAME' => 'Al Balushi,Anad Dadrahman','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '30.000','GPA' => '3.700','EagleMail_ID' => 'A.D.AlBalushi@eagle.clarion.edu'),
    array('ID' => '11044225','NAME' => 'Wood,Tyrek Lamar','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '6.000','GPA' => '0.300','EagleMail_ID' => 'T.L.Wood@eagle.clarion.edu'),
    array('ID' => '11044362','NAME' => 'Caro,Travis Brady','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '120.000','GPA' => '3.959','EagleMail_ID' => 'T.B.Caro@eagle.clarion.edu'),
    array('ID' => '11044370','NAME' => 'Bowser,Noah Matthew','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '24.000','GPA' => '3.625','EagleMail_ID' => 'N.M.Bowser@eagle.clarion.edu'),
    array('ID' => '11044372','NAME' => 'Millis,Joshua Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '27.000','GPA' => '3.111','EagleMail_ID' => 'J.M.Millis@eagle.clarion.edu'),
    array('ID' => '11044376','NAME' => 'Levay,Megan Anne','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '9.000','GPA' => '1.250','EagleMail_ID' => 'M.A.Levay@eagle.clarion.edu'),
    array('ID' => '11044451','NAME' => 'Vybiral Jr,Matthew Scott','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '65.000','GPA' => '2.176','EagleMail_ID' => 'M.S.Vybiral@eagle.clarion.edu'),
    array('ID' => '11044542','NAME' => 'Kiefer,Benjamin Christopher','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '46.000','GPA' => '1.767','EagleMail_ID' => 'B.C.Kiefer@eagle.clarion.edu'),
    array('ID' => '11044566','NAME' => 'Isaacson,Jeremy Scott','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '78.000','GPA' => '3.077','EagleMail_ID' => 'J.S.Isaacson@eagle.clarion.edu'),
    array('ID' => '11044585','NAME' => 'Chapman,Cassandra Marie','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '48.000','GPA' => '2.167','EagleMail_ID' => 'C.M.Chapman@eagle.clarion.edu'),
    array('ID' => '11044709','NAME' => 'VanSickle,John Wayne','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '51.000','GPA' => '1.947','EagleMail_ID' => 'J.W.Vansickle@eagle.clarion.edu'),
    array('ID' => '11044739','NAME' => 'Hrubetz,Sarah Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '121.000','GPA' => '3.065','EagleMail_ID' => 'S.M.Hrubetz@eagle.clarion.edu'),
    array('ID' => '11044784','NAME' => 'Wilson,Tanner M','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '25.650','GPA' => '1.167','EagleMail_ID' => 'T.M.Wilson3@eagle.clarion.edu'),
    array('ID' => '11044841','NAME' => 'Dunn,Jonathan J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '24.000','GPA' => '3.625','EagleMail_ID' => 'J.J.Dunn@eagle.clarion.edu'),
    array('ID' => '11044846','NAME' => 'Colesar,Julie Ann','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '93.000','GPA' => '2.621','EagleMail_ID' => 'J.A.Colesar@eagle.clarion.edu'),
    array('ID' => '11045176','NAME' => 'Ogura,Ryo','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2181','Total' => '150.000','GPA' => '3.337','EagleMail_ID' => 'R.Ogura@eagle.clarion.edu'),
    array('ID' => '11045482','NAME' => 'Vedder Jr,Christopher Merkert','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '75.000','GPA' => '3.859','EagleMail_ID' => 'C.M.Vedder@eagle.clarion.edu'),
    array('ID' => '11045729','NAME' => 'Larson,Michelle Renee','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '75.000','GPA' => '3.958','EagleMail_ID' => 'M.R.Larson@eagle.clarion.edu'),
    array('ID' => '11045997','NAME' => 'Coble,Caitlin Michele','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '33.000','GPA' => '2.296','EagleMail_ID' => 'C.M.Coble@eagle.clarion.edu'),
    array('ID' => '11046544','NAME' => 'Reesman,Chad Michael','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '68.000','GPA' => '3.600','EagleMail_ID' => 'C.M.Reesman@eagle.clarion.edu'),
    array('ID' => '11046796','NAME' => 'Warren II,William W','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '60.000','GPA' => '2.619','EagleMail_ID' => 'W.W.Warren@eagle.clarion.edu'),
    array('ID' => '11046815','NAME' => 'Murrey,Aaron Benjiman','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '62.000','GPA' => '3.839','EagleMail_ID' => 'A.B.Murrey@eagle.clarion.edu'),
    array('ID' => '11046897','NAME' => 'Ondo,Matthew Ryan','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '12.000','GPA' => '0.000','EagleMail_ID' => 'M.R.Ondo@eagle.clarion.edu'),
    array('ID' => '11046944','NAME' => 'Maun,Brandon','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '60.000','GPA' => '2.650','EagleMail_ID' => 'B.R.Maun@eagle.clarion.edu'),
    array('ID' => '11046995','NAME' => 'Vincent,Alexander Dane','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '61.000','GPA' => '3.951','EagleMail_ID' => 'A.D.Vincent@eagle.clarion.edu'),
    array('ID' => '11047033','NAME' => 'Schmelzer,Michael David','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '36.000','GPA' => '2.250','EagleMail_ID' => 'M.D.Schmelzer@eagle.clarion.edu'),
    array('ID' => '11047092','NAME' => 'Stefaniak,Blayze Russell','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'B.R.Stefaniak@eagle.clarion.edu'),
    array('ID' => '11047137','NAME' => 'McCleary,Garrett Matthew','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '62.000','GPA' => '3.516','EagleMail_ID' => 'G.M.Mccleary@eagle.clarion.edu'),
    array('ID' => '11047228','NAME' => 'Orrvick,Benjamin Scott','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '49.000','GPA' => '2.423','EagleMail_ID' => 'B.S.Orrvick@eagle.clarion.edu'),
    array('ID' => '11047288','NAME' => 'Lewis II,Mark','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '15.000','GPA' => '3.200','EagleMail_ID' => 'M.Lewis1@eagle.clarion.edu'),
    array('ID' => '11047371','NAME' => 'Smathers,Steven Gregory','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '66.000','GPA' => '3.409','EagleMail_ID' => 'S.G.Smathers@eagle.clarion.edu'),
    array('ID' => '11047457','NAME' => 'Carroll,Alexander Xavier','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '54.000','GPA' => '2.421','EagleMail_ID' => 'A.X.Carroll@eagle.clarion.edu'),
    array('ID' => '11047548','NAME' => 'Stewart,Nathaniel T','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '17.000','GPA' => '1.200','EagleMail_ID' => 'N.T.Stewart@eagle.clarion.edu'),
    array('ID' => '11047609','NAME' => 'Nettleton,Lacy Lynn','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '29.000','GPA' => '2.862','EagleMail_ID' => 'L.L.Nettleton@eagle.clarion.edu'),
    array('ID' => '11047958','NAME' => 'Drake,Lucas Paul','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '44.000','GPA' => '2.380','EagleMail_ID' => 'L.P.Drake@eagle.clarion.edu'),
    array('ID' => '11048169','NAME' => 'Holmberg,Joseph James','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '57.000','GPA' => '3.211','EagleMail_ID' => 'J.J.Holmberg@eagle.clarion.edu'),
    array('ID' => '11048171','NAME' => 'Meyer,Christina Celeste','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '76.000','GPA' => '3.118','EagleMail_ID' => 'C.C.Meyer@eagle.clarion.edu'),
    array('ID' => '11048286','NAME' => 'Buckley,Aaron M','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '57.000','GPA' => '3.123','EagleMail_ID' => 'A.M.Buckley@eagle.clarion.edu'),
    array('ID' => '11048417','NAME' => 'Chatley,Eric Lee','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '57.000','GPA' => '3.316','EagleMail_ID' => 'E.L.Chatley@eagle.clarion.edu'),
    array('ID' => '11048475','NAME' => 'Gooden Jr,Melvin Eugene','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '60.000','GPA' => '2.800','EagleMail_ID' => 'M.E.Gooden@eagle.clarion.edu'),
    array('ID' => '11048603','NAME' => 'Neff,Austin','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '56.000','GPA' => '3.518','EagleMail_ID' => 'A.Neff1@eagle.clarion.edu'),
    array('ID' => '11048824','NAME' => 'Kiley,Sean Walter','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '57.000','GPA' => '3.316','EagleMail_ID' => 'S.W.Kiley@eagle.clarion.edu'),
    array('ID' => '11048865','NAME' => 'Jaquish,Michael Thomas','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '28.000','GPA' => '2.250','EagleMail_ID' => 'M.T.Jaquish@eagle.clarion.edu'),
    array('ID' => '11049141','NAME' => 'Reis,Keith R','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '12.000','GPA' => '1.000','EagleMail_ID' => 'K.R.Reis@eagle.clarion.edu'),
    array('ID' => '11049348','NAME' => 'Daugherty,Virgil Cecil','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '30.000','GPA' => '2.700','EagleMail_ID' => 'V.C.Daugherty@eagle.clarion.edu'),
    array('ID' => '11049409','NAME' => 'Vinton-Stormer,Robert J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '24.000','GPA' => '1.667','EagleMail_ID' => 'R.J.Vinton-Stormer@eagle.clarion.edu'),
    array('ID' => '11049478','NAME' => 'Talukdar,Tanmoy','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '60.000','GPA' => '2.410','EagleMail_ID' => 'T.Talukdar@eagle.clarion.edu'),
    array('ID' => '11049541','NAME' => 'Gibson,Timothy Craig','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '35.000','GPA' => '1.980','EagleMail_ID' => 'T.C.Gibson@eagle.clarion.edu'),
    array('ID' => '11049569','NAME' => 'Scranton,Felicia','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '64.000','GPA' => '2.690','EagleMail_ID' => 'F.Scranton@eagle.clarion.edu'),
    array('ID' => '11049602','NAME' => 'Prylinski,Ryan Gregory','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '126.000','GPA' => '3.846','EagleMail_ID' => 'R.G.Prylinski@eagle.clarion.edu'),
    array('ID' => '11049819','NAME' => 'George,Logan Benjamin','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '64.000','GPA' => '2.714','EagleMail_ID' => 'L.B.George@eagle.clarion.edu'),
    array('ID' => '11050126','NAME' => 'Burnett,John','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '40.000','GPA' => '2.047','EagleMail_ID' => 'J.Burnett@eagle.clarion.edu'),
    array('ID' => '11050352','NAME' => 'Streiff,Nicholas James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '18.000','GPA' => '2.000','EagleMail_ID' => 'N.J.Streiff@eagle.clarion.edu'),
    array('ID' => '11050554','NAME' => 'Vinton,Kenneth','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '6.000','GPA' => '0.500','EagleMail_ID' => 'K.Vinton@eagle.clarion.edu'),
    array('ID' => '11051143','NAME' => 'Frketich,Virginia Gail','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '21.000','GPA' => '1.750','EagleMail_ID' => 'V.G.Frketich@eagle.clarion.edu'),
    array('ID' => '11051183','NAME' => 'McConnell,Shawn A','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '18.000','GPA' => '3.333','EagleMail_ID' => 'S.A.McConnell@eagle.clarion.edu'),
    array('ID' => '11051201','NAME' => 'Pirosko,Kelly','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '27.000','GPA' => '3.778','EagleMail_ID' => 'K.Pirosko@eagle.clarion.edu'),
    array('ID' => '11051520','NAME' => 'Stevens,Darius J.','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '30.000','GPA' => '3.800','EagleMail_ID' => 'D.J.Stevens@eagle.clarion.edu'),
    array('ID' => '11051695','NAME' => 'Edwards,Jack Lee','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '63.000','GPA' => '3.742','EagleMail_ID' => 'J.L.Edwards@eagle.clarion.edu'),
    array('ID' => '11051964','NAME' => 'Nelson,Jonathan Dean','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '33.000','GPA' => '3.000','EagleMail_ID' => 'J.D.Nelson@eagle.clarion.edu'),
    array('ID' => '11052230','NAME' => 'Meterko,Jerad Charles','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2171','Total' => '12.000','GPA' => '1.143','EagleMail_ID' => 'J.C.Meterko@eagle.clarion.edu'),
    array('ID' => '11052350','NAME' => 'Heath Jr,Kevin Michael','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '26.000','GPA' => '2.846','EagleMail_ID' => 'K.M.Heath@eagle.clarion.edu'),
    array('ID' => '11052521','NAME' => 'Criley,Mychele Anne','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '32.000','GPA' => '2.781','EagleMail_ID' => 'M.A.Criley@eagle.clarion.edu'),
    array('ID' => '11052550','NAME' => 'Duncan,Justin Edward','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '104.000','GPA' => '3.857','EagleMail_ID' => 'J.E.Duncan@eagle.clarion.edu'),
    array('ID' => '11052573','NAME' => 'Coxon,Eric Anthony','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '49.000','GPA' => '3.710','EagleMail_ID' => 'E.A.Coxon@eagle.clarion.edu'),
    array('ID' => '11052961','NAME' => 'McCandless,Cody Joseph','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '138.500','GPA' => '4.000','EagleMail_ID' => 'C.J.McCandless@eagle.clarion.edu'),
    array('ID' => '11053005','NAME' => 'Lander,Jonathan','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '54.000','GPA' => '2.300','EagleMail_ID' => 'J.D.Lander@eagle.clarion.edu'),
    array('ID' => '11053015','NAME' => 'Wilson,Ryan James','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '30.000','GPA' => '2.600','EagleMail_ID' => 'R.J.Wilson3@eagle.clarion.edu'),
    array('ID' => '11053019','NAME' => 'Smeal,Nathan Arthur','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '50.000','GPA' => '3.909','EagleMail_ID' => 'N.A.Smeal@eagle.clarion.edu'),
    array('ID' => '11053035','NAME' => 'Colarte,Kenneth G','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '15.000','GPA' => '3.600','EagleMail_ID' => 'K.G.Colarte@eagle.clarion.edu'),
    array('ID' => '11053137','NAME' => 'Randolph,Ryan Scott','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '30.000','GPA' => '2.100','EagleMail_ID' => 'R.S.Randolph@eagle.clarion.edu'),
    array('ID' => '11053149','NAME' => 'DeMark,Richard Vincent','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '42.000','GPA' => '3.333','EagleMail_ID' => 'R.V.Demark@eagle.clarion.edu'),
    array('ID' => '11053190','NAME' => 'Simpson,Diane E','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '33.000','GPA' => '3.091','EagleMail_ID' => ''),
    array('ID' => '11053219','NAME' => 'Robertson,Samantha Cassandra','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '27.000','GPA' => '2.300','EagleMail_ID' => 'S.C.Archer@eagle.clarion.edu'),
    array('ID' => '11053471','NAME' => 'Best,Ryan Scott','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '47.000','GPA' => '4.000','EagleMail_ID' => 'R.S.Best@eagle.clarion.edu'),
    array('ID' => '11053502','NAME' => 'Wolbert,Adam Eugene','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '36.000','GPA' => '4.000','EagleMail_ID' => 'A.E.Wolbert@eagle.clarion.edu'),
    array('ID' => '11053880','NAME' => 'Edney,Benjamin Levi','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '30.000','GPA' => '2.800','EagleMail_ID' => 'B.L.Edney@eagle.clarion.edu'),
    array('ID' => '11054071','NAME' => 'Pack,Valerie Lynne','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '27.000','GPA' => '1.800','EagleMail_ID' => 'V.L.Pack@eagle.clarion.edu'),
    array('ID' => '11054157','NAME' => 'Harrison IV,Joseph Ralph','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '38.000','GPA' => '3.250','EagleMail_ID' => 'J.R.Harrison@eagle.clarion.edu'),
    array('ID' => '11054358','NAME' => 'Hundertmark,Nathan Spencer','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2181','Total' => '30.000','GPA' => '2.600','EagleMail_ID' => 'N.S.Hundertmark@eagle.clarion.edu'),
    array('ID' => '11054613','NAME' => 'Sherer,Paul Marshall','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '27.000','GPA' => '1.742','EagleMail_ID' => 'P.M.Sherer@eagle.clarion.edu'),
    array('ID' => '11054745','NAME' => 'Foster,Nathan R.','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2178','Total' => '15.000','GPA' => '3.200','EagleMail_ID' => 'N.R.Foster@eagle.clarion.edu'),
    array('ID' => '11064529','NAME' => 'Carper,Ryan Cameron','LOCATION' => 'Clarion','CURRENT' => 'Y','Last_Term' => '2188','Total' => '0.000','GPA' => '0.000','EagleMail_ID' => 'R.C.Carper@eagle.clarion.edu'));

//test data, INNERJOIN'd results
$student2 = array(
    array('ID' => '10042603','NAME' => 'Porter,Hunter J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '42.000','GPA' => '2.224','EagleMail_ID' => 'H.J.Porter@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '10042603','NAME' => 'Porter,Hunter J','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '42.000','GPA' => '2.224','EagleMail_ID' => 'H.J.Porter@eagle.clarion.edu','Plan' => 'MN INF SYS'),
    array('ID' => '10509518','NAME' => 'Corvino,Melissa Marie','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2091','Total' => '39.000','GPA' => '3.923','EagleMail_ID' => 'M.M.Corvino@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11015216','NAME' => 'Walentosky,Matthew James','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '30.000','GPA' => '3.667','EagleMail_ID' => 'M.J.Walentosky@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11018162','NAME' => 'Hoffmann,Maximilian','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2121','Total' => '32.000','GPA' => '2.682','EagleMail_ID' => 'M.Hoffmann1@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11021113','NAME' => 'Martin,Kenneth Earl','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2135','Total' => '30.000','GPA' => '2.735','EagleMail_ID' => 'K.E.Martin1@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11024439','NAME' => 'McCoy,Andrew Edward','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2141','Total' => '50.000','GPA' => '3.360','EagleMail_ID' => 'A.E.Mccoy@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11028036','NAME' => 'O\'Donnell,David Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2149','Total' => '39.000','GPA' => '3.231','EagleMail_ID' => 'D.M.Odonnell@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11028036','NAME' => 'O\'Donnell,David Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2149','Total' => '39.000','GPA' => '3.231','EagleMail_ID' => 'D.M.Odonnell@eagle.clarion.edu','Plan' => 'BS MATH'),
    array('ID' => '11030628','NAME' => 'Kissick,Charles','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '59.000','GPA' => '3.071','EagleMail_ID' => 'C.Kissick@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11030628','NAME' => 'Kissick,Charles','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '59.000','GPA' => '3.071','EagleMail_ID' => 'C.Kissick@eagle.clarion.edu','Plan' => 'MN FRENCH'),
    array('ID' => '11030628','NAME' => 'Kissick,Charles','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2151','Total' => '59.000','GPA' => '3.071','EagleMail_ID' => 'C.Kissick@eagle.clarion.edu','Plan' => 'MN MATH'),
    array('ID' => '11037970','NAME' => 'Brown,Kegan Michael','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2158','Total' => '30.000','GPA' => '2.100','EagleMail_ID' => 'K.M.Brown4@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '10000414','NAME' => 'Hinton,Lorri Ann','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2161','Total' => '33.000','GPA' => '3.719','EagleMail_ID' => 'L.A.Hinton@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11039847','NAME' => 'MacNamara,Drew William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '59.000','GPA' => '3.390','EagleMail_ID' => 'D.W.MacNamara@eagle.clarion.edu','Plan' => 'BS CS'),
    array('ID' => '11039847','NAME' => 'MacNamara,Drew William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '59.000','GPA' => '3.390','EagleMail_ID' => 'D.W.MacNamara@eagle.clarion.edu','Plan' => 'MN ART'),
    array('ID' => '11039847','NAME' => 'MacNamara,Drew William','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '59.000','GPA' => '3.390','EagleMail_ID' => 'D.W.MacNamara@eagle.clarion.edu','Plan' => 'MN WEB DEV'),
    array('ID' => '11041024','NAME' => 'Ramsey,Landon Arthur','LOCATION' => 'Clarion','CURRENT' => 'N','Last_Term' => '2168','Total' => '36.000','GPA' => '2.475','EagleMail_ID' => 'L.A.Ramsey@eagle.clarion.edu','Plan' => 'BS CS')
);
$student2 = combineJoinResults($student2); //combine results of INNERJOIN into final array structure (Plan[])

$student3 = combineJoinResults(getStudentQuestionResults($stdq));

$student = $student3;

//determine what year a student is
function determineYear($credits){
    if ($credits < 30){
        return "  Freshman";
    }
    else if ($credits < 60) {
        return " Sophomore";
    }
    else if ($credits <90 ) {
        return "Junior";
    }
    else {
        return "Senior";
    }
}
?>


<body style="font-size: 20px; " class="wowItLooksReallyNice" onload="hideStuff()">
<h1><center>
        <input type="button" value="Back"  class="btn btn-danger left"  onclick="window.history.back()"/>
<?php
if (isset($stdq->searchName) and $stdq->searchName != "" and $stdq->searchName != null){
    echo ($stdq->searchName);
}
else if (isset($_POST['loadedSearch'])){
    echo $_POST['loadedSearch'];
}
?>

</h1></center>

<h5>Class Ranks: <?php
    if (isset($stdq->rankFR)) {
        echo "FR ";
    }
    if (isset($stdq->rankSO)){
        echo "SO ";
    }
    if (isset($stdq->rankJR)){
        echo "JR ";
    }
    if (isset($stdq->rankSR)){
        echo "SR";
    }
    ?>
    <br>
    <?php
    $value0 = " ";
    $value1 = " ";
    $value2 = " ";
    $value3 = " ";
    $value4 = " ";
    $value5 = " ";
    $value6 = " ";
    $value7 = " ";
    $questionData = $stdq->data;
    foreach ($questionData as $item=>$value){
        if (substr($item,-2) <= '09') {
            $value0 .= $value." ";
        }
        if (substr($item,-2) <= '19' && substr($item,-2) >'09') {
            $value1 .= $value." ";
        }
        if (substr($item,-2) <= '29' && substr($item,-2) >'19') {
            $value2 .= $value." ";
        }
        if (substr($item,-2) <= '39' && substr($item,-2) >'29') {
            $value3 .= $value." ";
        }
        if (substr($item,-2) <= '49' && substr($item,-2) >'39') {
            $value4 .= $value." ";
        }
        if (substr($item,-2) <= '59' && substr($item,-2) >'49') {
            $value5 .= $value." ";
        }
        if (substr($item,-2) <= '69' && substr($item,-2) >'59') {
            $value6 .= $value." ";
        }
        if (substr($item,-2) <= '79' && substr($item,-2) >'69') {
            $value7 .= $value." ";
        }


    }

    if (isset($stdq->cat0)){
        echo $stdq->cat0.":".$value0;
    }
    ?>
    <br>
    <?php
    if (isset($stdq->cat1)){
        echo $stdq->cat1.":".$value1;
    }
    ?>
    <br>
    <?php
    if (isset($stdq->cat2)){
        echo $stdq->cat2.":".$value2;
    }
    ?>
    <br>
    <?php
    if (isset($stdq->cat3)){
        echo $stdq->cat3.":".$value3;
    }
    ?>
    <br>
    <?php
    if (isset($stdq->cat4)){
        echo $stdq->cat4.":".$value4;
    }
    ?>
    <br>
    <?php
    if (isset($stdq->cat5)){
        echo $stdq->cat5.":".$value5;
    }
    ?>
    <br>
    <?php
    if (isset($stdq->cat6)){
        echo $stdq->cat6.":".$value6;
    }
    ?>
    <br>
    <?php
    if (isset($stdq->cat7)){
        echo $stdq->cat7.":".$value7;
    }
    ?>

</h5>

<center><br><h3>Results Found: <?php echo count($student); ?></h3></center>

<center>
    <table class="result_table" id ="result_table">
        <tr>
            <th id="checkboxes">&nbsp;</th>
            <th onclick = sortTable(1)>ID</th>
            <th onclick = sortTable(2)>Name</th>
            <th onclick = sortTable(3)>Location</th>
            <th onclick = sortTable(4)>Current</th>
            <th onclick = sortTable(5)>Last Term</th>
            <th onclick = sortTable(6)>Total Credits</th>
            <th onclick = sortTable(7)>Rank</th>
            <th onclick = sortTable(8)>GPA</th>
            <th onclick = sortTable(9)>Programs</th>
            <th onclick = sortTable(10)>Eagle Mail</th>
            <th>History</th>
        </tr>

        <?php
        foreach ($student as $aResult)
        {
            ?>
            <tr>
                <td><input type="checkbox"/></td>
                <td><?php echo $aResult['ID']; ?></td>
                <td><?php echo $aResult['NAME']; ?></td>
                <td><?php echo $aResult['LOCATION']; // need location on this ?></td>
                <td><?php echo $aResult['CURRENT']; ?></td>
                <td><?php echo $aResult['Last_Term']; ?></td>
                <td><?php
                    if (strlen(($aResult['Total'])) == 1)
                        echo '   ' . $aResult['Total'];
                    else if (strlen(($aResult['Total'])) == 2)
                        echo '  ' . $aResult['Total'];
                    else if (strlen(($aResult['Total'])) == 3)
                        echo ' ' . $aResult['Total'];
                    else echo $aResult['Total'];
                    ?></td>
                <td><?php echo determineYear($aResult['Total']); //need year on this ?></td>
                <td><?php echo ($aResult['GPA'] + 0); ?></td>

                <td>    <?php
                        foreach ($aResult['Plan'] as $program){ //for each program
                            if (count($aResult['Plan']) == 1){  //if its the ONLY PROGRAM, no comma
                                echo $program;
                            }
                            else if($aResult['Plan'][count($program) - 1] == $program){//if its the last program, NO COMMA
                                    echo $program . ',';
                            }
                            else echo $program;//if we're here, we'll have more programs, so YES COMMA
                            } //need programs on this ?>
                </td>

                <td><?php echo $aResult['EagleMail_ID']; ?></td>
                <td><button onclick = "displayClassHistory(<?php echo $aResult['ID'] . ',`' . $aResult['NAME'] . '`' ?>)" > History </button></td>
            </tr>
            <?php
        }
        ?>

    </table></center>

<!--this is a div that contains all the buttons the user can interact with-->
<br>
<div id = "resultsButtons"><center>
    <button onclick = "copyEmailsToClipboard()" > Copy Selected Emails to Clipboard </button>
    <button onclick = "selectAllResults()" > Check all </button>
    <button onclick = "deselectAllResults()" > Uncheck all </button>
    <button onclick = "exportTableToExcel('result_export_table', 'student-question-results')" > Export to Excel</button>


    <!--this is where the list of emails is stored-->
    <input id="emailList" type="text" readonly>
    </center></div>


<!--this here is where we hold the table that gets exported to excel sheet-->
<div id ="exportResults"  >

    <table class="result_export_table" id ="result_export_table">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Location</th>
            <th>Current</th>
            <th>Last Term</th>
            <th>Total Credits</th>
            <th>Rank</th>
            <th>GPA</th>
            <th>Programs</th>
            <th>Eagle Mail</th>
        </tr>

        <?php
        foreach ($student as $aResult)
        {
            ?>
            <tr>
                <td><?php echo $aResult['ID']; ?></td>
                <td><?php echo $aResult['NAME']; ?></td>
                <td><?php echo $aResult['LOCATION'];  ?></td>
                <td><?php echo $aResult['CURRENT']; ?></td>
                <td><?php echo $aResult['Last_Term']; ?></td>
                <td><?php echo $aResult['Total']; ?></td>
                <td><?php echo determineYear($aResult['Total']);  ?></td>
                <td><?php echo $aResult['GPA']; ?></td>
                <td>    <?php
                    foreach ($aResult['Plan'] as $program){
                        echo $program . ',';
                    } //need programs on this ?>
                </td>
                <td><?php echo $aResult['EagleMail_ID']; ?></td>
            </tr>
            <?php
        }
        ?>
</div>

</body>
</html>