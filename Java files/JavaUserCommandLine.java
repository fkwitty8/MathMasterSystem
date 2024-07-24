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


 //displays and manages initial screen prompts
 public void processCommand(int Counter){

    //Declaring Formatting variables
    String Cyan = "\u001B[36m";
    String Green = "\u001B[32m";
    String Restore = "\u001b[0m";
    String Red = "\u001B[31m";
    String Italic = "\033[3m";
    String Yellow="\u001B[33m";

    if(Counter==1){
        System.err.print(" ONE MORE TRIAL REMAINING!......\n\n");
        try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
    System.out.println("+------------------------------+");
    System.out.println("+ SELECT ANY OPTION AND PROCEED+");
    System.out.println("+------------------------------+");
    System.out.println("     register\n     login\n     view challenge");
    System.out.print("\nSelected Option: ");

    System.out.print(Green+Italic);
    Command=Input.nextLine();
    System.out.print(Restore);

    //initialising the first option variable
    if (Command.equals("register")) {
       FirstOption = "Register";
    } else if (Command.equals("login")) {
        FirstOption = "Login";
    } else if (Command.equals("view challenge")) {
        FirstOption = "ViewChallenge";
    }

    // calling the function to handle the second selection accordingly
    switch (Command) {
        case "register":

            secondCommandManagement(FirstOption,Counter);
            break;
        case "login":
            //function call
            secondCommandManagement(FirstOption,Counter);
            break;
        case  "view challenge":
            System.out.println(Cyan+" You have chosen "+FirstOption+"!");
            System.out.println(Restore);
            user.viewChallenge();
            break;
        default://capture the invalid user inputs up to max of TWO TIMES.
            System.err.println("-----INVALID OPTION!-----" +
                    "\n You must only Use small letters throughout. And also, insert each command as it appears" +
                    "\n Thank you!");
            try {
                Thread.sleep(1000);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
            Counter++;
            if (Counter == 2) {
                System.err.println(" Exceeded maximum trials!!\n Try again Later, thank you. ");
                break;
            }
            processCommand(Counter);
    }


}

// displays and manages second Option prompts
public  void secondCommandManagement(String FirstOption,int Counter)  {

    //Declaring Formatting variables
    String Cyan = "\u001B[36m";
    String Green = "\u001B[32m";
    String Restore = "\u001b[0m";
    String Red = "\u001B[31m";
    String Italic = "\033[3m";
    String Yellow="\u001B[33m";

    Counter=0;
    System.out.println(Cyan+" You have chosen "+FirstOption+"!"+Restore) ;
    System.out.println("\n+-------------------------+|");
    System.out.println("+ "+FirstOption+" as:");
    System.out.println("+-------------------------+|");
    System.out.print("     school representative \n     pupil\n     back\n\nSelect Option: ") ;

    System.out.print(Green+Italic);
    Command= Input.nextLine();
    System.out.print(Restore);



    //Initialising the second option variable
    if(Command.equals("school representative")){
            SecondOption="School Representative";
            System.out.println(Cyan+" You have chosen, "+FirstOption+" as "+SecondOption+"."+Restore) ;
        }
        else if(Command.equals("pupil")){
            SecondOption="Pupil";
            System.out.println(Cyan+" You have chosen, "+FirstOption+" as "+SecondOption+"."+Restore) ;
        }
        else if(Command.equals("back")){
            SecondOption="Back";
            System.out.println(Cyan+" You have chosen, "+SecondOption+"."+Restore) ;
        }

          // evaluating the first options

        //if it is register execute this code block
        if(FirstOption=="Register") {
            switch (Command) {
                case "school representative":
                    //calling register method of schoolRepresentative class
                   Rep.register(SecondOption,Counter,FirstOption);
                    break;
                case "pupil":
                    //calling register method of pupil class
                    pupil.register(SecondOption,Counter,FirstOption);
                    break;
                case "back":
                        back(Counter);
                    break;
                default://error if invalid option
                    System.err.println("-----INVALID OPTION!-----" +
                            "\n You must only Use small letters throughout. And also, insert each command as it appears");
                    try {
                        Thread.sleep(1000);
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                    Counter++;
                    if (Counter == 2) {
                        System.err.println(" Exceeded maximum trials!!\n Try again Later, thank you. ");
                        break;
                    }
                    processCommand(Counter);
            }
        }


        //if it is a login
        else if(FirstOption=="Login"){
            switch (Command) {
                case "school representative"://calling Login method of schoolRepresentative class
                    Counter=0;
                    Rep.login(SecondOption,Counter,FirstOption);
                    break;
                case "pupil":
                    Counter=0;
                    pupil.login(SecondOption,Counter,FirstOption);//calling login method of schoolRepresentative class
                    break;
                case "back":
                        back(Counter);
                    break;
                default://error if invalid option
                    System.err.println("-----INVALID OPTION!-----" +
                            "\n You must only Use small letters throughout. And also, insert each command as it appears" +
                            "\n Thank you!");
                    try {
                        Thread.sleep(1000);
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                    Counter++;
                    if (Counter == 2) {
                        System.err.println(" Exceeded maximum trials!!\n Try again Later, thank you. ");
                        break;
                    }
                    processCommand(Counter);
            }
        }

}

//Back Option Manager,manages the back process back when selected by the user.
public void back(int Counter)  {
    Counter=0;
    //System.out.println(" Clear Screen");
    processCommand(Counter);
}

 //handles submissions to server
 public void submitDetails(int Counter,String FirstOption,String SecondOption,String ID,String SchoolNumber,String FirstName,String LastName,String UserName,String DOB,String Email,String Password,byte[] ImageData,String ImagePath) {

    //Declaring Formatting variables
    String Cyan = "\u001B[36m";
    String Green = "\u001B[32m";
    String Restore = "\u001b[0m";
    String Red = "\u001B[31m";
    String Italic = "\033[3m";
    String Yellow="\u001B[33m";


    String Command;
    if (Counter == 1) {
        System.err.print(" ONE MORE TRIAL REMAINING!......\n\n");
        try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
    System.out.print("\n+-----Enter "+Yellow+"[ submit ] "+Restore+"to submit-----+\n              ");

    System.out.print(Green+Italic);
    Command = Input.nextLine();
    System.out.print(Restore);

    //checking the input whether its "submit" or "invalid input"
        switch (Command) {
            case "submit":
                System.out.print("+-----Are you sure to Submit"+Yellow+"[yes/no]"+Restore+"-+\n             ");

                System.out.print(Green+Italic);
                Command = Input.nextLine();
                System.out.print(Restore);

                //checks whether reply is "Yes, submit" or " not submit"
                if (Command.equals("yes")) {

                    System.out.print("\n" + Green + "Submitting to server.");

                    //Animates the dots to imitate loading
                    for (int i = 0; i < 5; i++) {
                        try {
                            Thread.sleep(500);
                            System.out.print(Green + ".");
                        } catch (InterruptedException e) {
                            e.printStackTrace();
                        }
                    }
                    System.out.print(Restore);
                    try {
                        //setting up Client-server connection
                        String FeedBack;
                        AttributesTobeSubmited ATS = new AttributesTobeSubmited(FirstOption, SecondOption, ID, SchoolNumber, FirstName, LastName, UserName, DOB, Email, Password,ImageData,ImagePath);
                        this.socket = new Socket("localhost", 1111);
                        this.OOS = new ObjectOutputStream(socket.getOutputStream());
                        this.OIS = new ObjectInputStream(socket.getInputStream());
                        OOS.writeObject(ATS);
                        OOS.flush();

                    }
                }}