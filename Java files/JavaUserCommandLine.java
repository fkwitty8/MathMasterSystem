// THIS CLASS PUPIPL WILL CONTAIN ALL THE METHODS THAT IMPLEMENTS THE REQUIREMENTS OF A PUPIL , AND OF WHICH IT INHERITS OTHERS FROM THE USER
class Pupil extends User {


    //displays challenges and enables a participant who is logged in to take up a given challenge
    public void viewChallenge(Socket socket, ObjectInputStream OIS, ObjectOutputStream OOS, int Counter) {
        ArrayList<Challenge> challenges = new ArrayList<>();

        //Declaring Formatting variables
        String Cyan = "\u001B[36m";
        String Green = "\u001B[32m";
        String Restore = "\u001b[0m";
        String Red = "\u001B[31m";
        String Italic = "\033[3m";
        String Yellow="\u001B[33m";

        
    }

       


}



//initial CLI user interface management class
class UserInterface{
    Socket socket;
    ObjectInputStream OIS;
    ObjectOutputStream OOS;
    Scanner Input= new Scanner(System.in);
    Pupil pupil=new Pupil();
    User user=new User();
    SchoolRep Rep=new SchoolRep();
    String Command,FirstOption, SecondOption;
}


