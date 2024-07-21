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

        String FeedBack, Response;

        try {
            //sending a response to be server to initiate the sending of the challenge array
            Response = "Generate Content";
            OOS.writeObject(Response);
            if (Counter == 1) {
                System.err.print(" ONE MORE TRIAL REMAINING......\n\n");
                Thread.sleep(1000);
            }

            // retrieving an array of challenge objects from the server
            FeedBack = (String) OIS.readObject();
            if (FeedBack.equalsIgnoreCase("No Challenges Yet!")) {
                System.out.println(Red+"No challenges available!"+Restore);
            } else {
                System.out.println();
                Response = "Send Data";
                OOS.writeObject(Response);
                challenges = (ArrayList<Challenge>) OIS.readObject();
                for (Challenge challenge : challenges) {
                    System.out.println(Cyan + challenge);
                }
                System.out.println(Restore);
                questionLoader(socket, OIS, OOS, Counter, challenges);
            }
        } catch (InterruptedException e) {
            throw new RuntimeException(e);
        } catch (IOException e) {
            e.printStackTrace();
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }
    }
cd

        
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
//School Representative class and it's methods
class SchoolRep extends User {
    //for viewing challenges after logging in
    public void viewChallenge() {
        System.out.println("view challenge");
    }


    //for viewing applicants on a particular school from the java file
    public void viewApplicant(ObjectInputStream OIS, ObjectOutputStream OOS, int Counter, String Command) {

        //Declaring Formatting variables
        String Cyan = "\u001B[36m";
        String Green = "\u001B[32m";
        String Restore = "\u001b[0m";
        String Red = "\u001B[31m";
        String Italic = "\033[3m";
        String Yellow="\u001B[33m";
    }
}

