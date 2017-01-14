# auto_skola_volan

Anisa Hadzibulic 17178

U okviru svog projekta za WT, pokusati cu napraviti web stranicu za jednu auto skolu. Detaljniji opis uskoro. :) 

##  SPIRALA 1

I - Uradjeno je (nadam se) sve zahtijevano 

Mokapi(koji se nalaze u istoimenom folderu) 

6 stranica (ukljucujuci 3 sa html formama) koje su adaptivne i na mobilnim uredjajima

Meni se nalazi na svim stranicama

Validacija uradjena na stranicama koje smo koristili na tutorijalima
    
II -

III -

IV - Bug (koji nije bug) je nesto sto sam nasla prilikom validacije, tacnije warning koji nije dao koristenje "date" tipa na inputu, dakle ne error vec samo warning jer vjerovatno date nije podrzan na starijim browserima

V - 

    MOKAPI - folder u kojem se nalaze skice mojih stranica, za sve uredjaje
    
    SLIKE - u ovom folderu se nalaze slike koje sam koristila u spirali (slika na meniju, slika na pocetnoj stranici i sl)
    
    STYLE -
            DodajKomentarStyle - Style vezan za html page DodajKomentar           
            KomentariStyle - Style vezan za html page Komentari           
            KontaktStyle - Style vezan za html page Kontakt            
            layout - Moj grid  
            MeniStyle - U njemu sam odvojila style vezan za meni nakon sto sam vidjela da mi se previse koda kopira, i kako bih   
            napravila spiralu preglednijom. U njoj je takodjer i style vezan za sliku koja se nalazi na index.html fajlu            
            ONamaStyle - Style vezan za page ONama          
            PrijaviSeStyle - Style vezan za page PrijaviSe 
            
   OSTATAK FOLDERA -
   
            DodajKomentar - Na ovu stranicu se dolazi iz stranice Komentari i predstavlja nacin da ljudi koji su imali iskustvo sa  
            autoskolom ostave neku vrstu reviewa (html forma sadrzana)
            
            index - Pocetna stranica
            
            Komentari - Reviewi bivsih korisnika
            
            Kontakt - Page koji daje opciju da se auto skola kontaktira i koji daje neke informacije o brojevima telefona i lokaciji  
            (html forma sadrzana)
            
            ONama - Page koji daje osnovne informacije o auto skoli 
            
            Prijavi se - Page koji daje mogucnost da ukoliko se neko vec odlucio za ovu auto skolu da se automatski prijavi (html forma
            sadrzana)
            
            (Na sve stranice osim na "DodajKomentar" se dolazi sa pocetnog menija) 
            

##  SPIRALA 2

    I            Uradjena je validacija svih formi uz odgovarajuce poruke iznad polja za unos
                Onemoguceno je slanje forme ukoliko sva polja nisu unesena na odgovarajuci nacin
                Za drugi zadatak sam izabrala galeriju i localstorage
                Dodana je nova stranica Vozila.html (na kojoj sam implementirala jedan dio drugi zadatka - Galeriju)
                localstorage je implementiran na stranici DodajKomentar.html preko DodajKomentar.js
                Uradjen dio sa ajaxom pomocu myJSFile.js i myJSFile2.js
II -
III -
IV -
V - 
            Sadrzaj foldera je ostao isti uz dodatke i izmjene:  
            
            SLIKE - dodane slike koje sam koristila u Vozila.html
            
            STYLE - VozilaStyle.css - css koristen za Vozila.html    
            
           OSTATAK FOLDERA -
                    index.html - Pocetna stranica (koja sada sadrzi meni i div na kojem se ucitavaju druge podstranice)
                    
                    _index.html - Podstranica koja sadrzi sliku - koristi se za homepage, na nju dodjemo na pocetku(inicijalno) i klikom                    na sliku menija
                    
                    Vozila.html - Podstranica na kojoj se nalazi galerija slika koju sam iskoristila za implementaciju dijela drugog                        zadatka
                    
                    DodajKomentar.js - js file koji sam koristila za validaciju forme na istoimenoj podstranici i za implementaciju                         dijela drugog zadatka vezanog za localstorage
                    
                    Kontakt.js - js file koji sam koristila za validaciju forme na istoimenoj podstranici
                    
                    PrijaviSe.js - js file koji sam koristila za validaciju forme na istoimenoj podstranici
                    
                    Vozila.js - js file vezan za implementaciju dijela drugog zadatka vezanog za galeriju
                    
                    myJSFile.js - js file koji sam koristila za implementaciju treceg zadatka (Ajax)
                    
                    myJSFile2.js - js file koji sam koristila za implementaciju treceg zadatka (Ajax) za ucitavanje podstranice 
                    DodajKomentar.html
                    (Na sve podstranice osim na "DodajKomentar" se dolazi sa pocetnog menija)
                    

##  SPIRALA 3

    I Uradjena je serijalizacija Usluga u XML, i tu je korisniku adminu omoguceno dodavanje novih usluga i edit i delete starih. Implementirana je zastita od XSS-a na koristenim formama za navedene radnje. Adminovi podaci (username i password) su zapisani u XML fajlu korisnici.xml. (username admin  i pass admin) 
    Takodjer, stranica Komentari.php uzima sadrzaj iz XML filea.

    II Korisnik admin ima mogucnost da uradi download liste usluga pomoci csv file-a

    III Korisnici imaju mogucnost da urade download liste usluga pomocu pdf file-a

    IV Na stranici Komentari.php je implementiran livesearch. Prikazuje se do 10 "hintova" na unesena slova. Pretrazuju se ime i prezime ljudi koji su ostavili komentar. Nakon sto se pritisne Pretrazi dugme, izbaci se lista komentara koji odgovaraju pretrazi.

    V Uradjen je deploy na openshift. http://mojprojekat-mojprojekat.44fs.preview.openshiftapps.com/


##  SPIRALA 4

        Napravila sam MySQL bazu sa 3 povezane tabele. Tabele su: korisnici, usluge i log_izvjestaja. U korisnicima cuvam korisnike, u uslugama usluge, a na svakoj usluzi se nalazi ID korisnika koji ju je kreirao. Update u logu izvjestaja
       se desava kada korisnik downloaduje CSV file, biljezi se trenutno vrijeme i ID korisnika. Sve fajlove koji su povezani sa ovim tabelama sam izmijenila i sada se podaci citaju iz ovih tabela i u njima se radi update(edit, delete i brisanje)

       Dodala sam novi file FunkcijeBaze.php u kojoj sam napravila sve funkcije koje su mi bile potrebne za citanje, dodavanje, brisanje i editovanje mojih tabela. Ovaj php file sam samo includala u druge file-ove, i iz njih pozivala potrebne funkcije.
       Napravila sam PHP skriptu koja mi prebacuje podatke iz XML-a u bazu (XMLuBazu.php). 
       Deployala sam stranicu na openshift i link je http://mojprojekat-mojprojekat.44fs.preview.openshiftapps.com/
       Napravila sam servis (servis.php) koji vraca podatke u obliku JSON-a. Testirala sam ovaj web servis i prilozila odgovarajuci .pdf file.
