
    <link rel="stylesheet" href="./style/PrijaviSeStyle.css">
<div>

    <div class="red">
        <div class="kolona dva">
        </div>

        <div class="kolona dva">
            <div class="kolona dva">
        </div>
        <div class="kolona dva">
            <h3>Login</h3>
        </div>
            
            <div class="kolona dva">
        </div>
        </div>

        <div class="kolona dva">
        </div>

    </div>

    <div class="red">

        <div class="kolona dva">
        </div>

       
            <form id="loginForm" action="LoginAction.php" method="POST">
                    
                    <div class="kolona dva" id="forma">                       
                        <label > Ime i prezime </label>
                        <div class="username"id="greskaUsername">
                            <p></p>
                         </div>
                        <input class="prijavaUnos" type="text" id="unoszaValid"  name="username">
                        
                        <label > Password </label>
                         <div class="red greska" id="greskaPassword">
                            <p> </p>
                         </div>
                        <input class="prijavaUnos" type="password id="brojTelefonazaValid" name="pass">
                       
                                 
                        <div class="red greska" id="validiranaForma">
                           <p> Sva polja nisu popunjena onako kako se zahtijeva! </p>
                         </div>
                        <input id="posaljiPrijavu" type="submit" name="posaljiPrijavu" value="Posalji prijavu" >               
                        
                    </div>
                </form>
        

        <div class="kolona dva">
        </div>
    </div>

</div>