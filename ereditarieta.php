<?php

// ---------------------- Ereditarietà----------------------------------------------

// Docente -> materia d'insegnamento(subject)
// Studente -> media scolastica


// In PHP una classe può ereditare una e una sola classe




// ABSTRACT -> keyword che serve per identificare un oggetto astratto che non puo essere istanziata

abstract class Person {          

    protected $name;          
    public $surname;
    public $age;   
      
    public function __construct($nome, $cognome, $eta){   
        $this->name = $nome;  
        $this->surname = $cognome;
        $this->age = $eta;  
    }



    // Nei metodi la keyord abstract mi permette di indirizzare il  mio codice implementando necessariamente questo metodo nelle classi figlie

    public abstract function introduceYou();  // La particolarità della funzione astratta è che non deve avere del codice all'interno
       // echo "Ciao mi chiamo " . $this->name . " $this->surname, ho $this->age anni\n"; 
    
}










class Teacher extends Person  {        //Teacher eredità da Person anche il costruttore della nostra classe genitore, quindi tutto il codice scritto sopra è stato implementato dentro questa classe

     public $subject;    // Attributo specifico per la classe Teacher

     public function __construct($nome, $cognome, $eta, $materia){  // Devo riutilizzare di nuovo il construct per passare i parametri reali per poi ripassarli di nuovo sotto

     parent::__construct($nome, $cognome, $eta);    // Parent è una keyword che fa riferimento a tutto quello che è disponibile nella CLASSE GENITORE, io pero devo usare il costruttore di quella classe e non di quello oggetto e quindi uso lo SCOPE RESOLUTION OPERATOR
 
        $this->subject = $materia;  // qui ci aggiungiamo l'attributo Subject specifico per Teacher

        echo $this->name; // qui non va in errore, perchè il name pur avendolo dichiarato PROTECTED nella classe PERSON essendo Teacher una classe figlia diretta di Person ha accesso comunque a $name perchè siamo in una classe figlia diretta

      }  


      public function introduceYou(){

        echo "Buongiorno ragazzi io sono " . $this->name . " $this->surname , e sono il vostro docente di $this->subject";  // Questa funzione deriva dalla funzione astratta che ho dato alla classe Person

      }

  }   









class Student extends Person{

    public $average; 

    public function __construct($nome, $cognome, $eta, $media){  //SINTASSI OBBLIGATORIA 

    parent::__construct($nome, $cognome, $eta);  // SINTASSI OBBLIGATORIA

        $this->average = $media;   

   }

   public function introduceYou(){

    echo "Bella sono  " . $this->name . " $this->surname , e vado forte e ho una media del $this->average";  // Questa funzione deriva dalla funzione astratta che ho dato alla classe Person

  }

}







$docente = new Teacher('Luca', 'Rossi', 44, 'PHP');
$studente = new Student('Bruno', 'Bianchi', 9, 9);




var_dump($docente);
var_dump($studente);


$docente->introduceYou();  // a docente gli posso dare la funzione presentati()
$studente->introduceYou(); // posso usare introduceYou perchè ho creato l'oggetto studente (o meglio l'istanza dell oggetto)









//----------------Modificatori di accesso---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------




// Con la keyword private io sto rendendo il mio attributo o il mio  metodo accessibile SOLO DENTRO LA MIA CLASSE, è come se avessi reso il mio attributo name disponibile localmente solo all'interno della mia classe

// Un altro modificatore di accesso è il PROTECTED, questo funge come il PRIVATE ma con questo rendo accessibile il mio metodo e il mio attributo solo da dentro la mia classe e nelle classi figlie dirette


//--------> errore vedi protected------->     echo $docente->name;  // A docente (che è un oggetto di classe Teacher e che ha ereditato la classe Person) gli chiedo di accedere sia ai suoi metodi che ai suoi attributi, e quindi richiedo l'attributo name, io NON LO posso fare questo perchè ha un accesso PROTECTED l'attributo name 





?>