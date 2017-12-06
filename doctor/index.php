<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>SZYBKI START Z BRACKETS</title>
        <meta name="description" content="Interaktywny poradnik szybkiego startu dla Brackets.">
        <link rel="stylesheet" href="main.css">
        
        <!-- Vue -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.4"></script>
        
       
    </head>
    <body>
        <div id="nav" class="wrapper">
            <a href="#">Wyloguj</a>
        </div>
        <hr/>
        <div id="logo">
            <h1><span>Health</span> <span>Connect</span></h1>
            <p>Twój Osobisty Asystent</p>
        </div>

        <section class="wrapper">
            
            <!--wyświetla obecnego i nastepnego pacjenta-->
            <div id="now-and-next">
                <ul>
                    <li>
                        <h4>Obecny Pacjent</h4>
                        <p>Imię i nazwisko: John Lemon</p>
                        <p>Godzina: 12:30</p>
                        <p>Problem: Lorizzle Ipsizzle Bang</p>
                    </li>
                    <li>
                        <h4>Następny Pacjent</h4>
                        <p>Godzina: 12:45</p>
                        <p>Problem: Lorizzle Ipsizzle Bang</p>
                    </li>
                </ul>
            </div>
            
            <!--elektroniczna karta pacjenta-->
            <div id="past-apps"><!--registers new Vue past-apps-->
            <div id="patient-card">
                <h2>Imię i Nazwisko: John Lemon</h2>
                <div id="app-form"><!--CURRENT APPOINTMENT-->
                    <h3>Dzisiejsza wizyta</h3>
                    <form><!--CURRENT APPOINTMENT FORM-->
                               <div>
                                   <label for="crt-apt">Wizyta</label>
                                   <input type="date">
                                </div>
                                <div>
                                    <label for="diagnose">Rozpoznanie</label>
                                    <input type="textarea" rows="4" cols="50" id="diagnose">
                                </div>
                                <div>
                                    <label for="treatment">Zastosowane leczenia</label>
                                    <input type="textarea" rows="4" cols="50" id="treatment">
                                </div>
                                <div>
                                    <label for="extra-notes">Adnotacje</label>
                                    <input type="textarea" rows="4" cols="50" id="extra-notes">
                                </div>
                                <div>
                                    <label for="next-apt">Następna wizyta</label>
                                    <input type="date" id="next-apt">
                                </div>
                                <div id="for-patient"><!--documents for patient-->
                                    <label>Dodatkowe dokumenty dla pacjenta</label>
                                    <div>
                                        <input type="checkbox" id="checkup"><label for="checkup">skierowanie na badanie diagnostyczne</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="consult"><label for="consult">skierowanie na konsultacje</label>
                                        </div>
                                    <div>
                                        <input type="checkbox" id="certif"><label for="certificate">zaświadczenia</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="statement"><label for="starement">orzeczenie</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" id="perscr"><label for="perscr">recepta</label>
                                    </div>
                                </div>
                        <button type="submit" v-on:click="postThisApp()" class="submit">Zapisz</button>
                            </form><!--end of CURRENT APPOINTMENT FORM-->
                    </div><!--end of CURRENT APPOINTMENT-->
                
                    <div><!--dane teleadresowe-->
                        <h3>Dane Teleadresowe</h3>
                        <ul>
                            <li v-for="info in patient">
                                <p>Numer ID: {{ info.idCard }}</p>
                                <p>Imię: {{ info.Name }}</p>
                                <p>Nazwisko: {{ info.surName }}</p>
                                <p>Adres: {{ info.address }}</p>
                            </li>
                        </ul>
                    </div><!--end of DANE TELEADRESOWE-->
                
                    <div id="past-visits"><!--tree of appointments--> 
                        <h3>Historia Leczenia</h3>
                        <ul>                                         
                            <li v-for="(visit, index) in visits">
                                <p>Data: {{ visit.date }}</p>
                                <p>Problem: {{ visit.desc }}</p>
                                <hr/>
                            </li>
                        </ul>
                    </div><!--end of TREE OF APPOINTMENTS-->
                </div><!--end of PATIENT CARD-->
            </div><!--end of Vue past-apps-->
            
            <!--plan dnia/pacjenci oczekujący w kolejce-->
            <div id="line">
                <h3>Oczekujący pacjenci</h3>
                <div id="queue">
                    <ul>
                        <li v-for="human in patients">
                            <button>
                                <p>Imię i Nazwisko: {{ human.Name }} {{ human.surName }}</p>
                                <p>Godzina: {{ human.time }}</p>
                                <p>Problem: {{ human.disease }}</p>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>  

        </section>
        <div id="footer">
            <p>COPYRIGHTS I DUNNO &copy;</p>
        </div>
        
        <?php
$servername = "localhost";
$username = "health_connect";
$password = "VICTORY";
$dbname = "healthconnectDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT queueNumber, emergency, idCard FROM room404";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>queue</th><th>idCard</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["queueNumber"]."</td><td>".$row["firstname"]." ".$row["idCard"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
        
        
        <script src="main.js"></script>
    </body>
</html>