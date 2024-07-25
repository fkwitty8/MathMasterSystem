import javax.imageio.ImageIO;
import javax.swing.text.Style;
import java.awt.*;
import java.awt.image.BufferedImage;
import java.net.Socket;
import java.net.UnknownHostException;
import java.time.*;
import java.util.*;
import java.io.*;
import java.util.Timer;
import java.util.concurrent.atomic.AtomicBoolean;
import java.util.concurrent.atomic.AtomicInteger;

//Java User CommandLine Class
public class JavaUserCommandLine {
    public static void main(String[] args) throws IOException, InterruptedException {

        //Declaring Formatting variables
        String Cyan = "\u001B[36m";
        String Green = "\u001B[32m";
        String Restore = "\u001b[0m";
        String Red = "\u001B[31m";
        String Italic = "\033[3m";
        String Yellow="\u001B[33m";

        //Logo to be animated
        String[] Logo={"M","A","T","H"," ","M","A","S","T","E","R"," ","S","Y","S","T","E","M"," ","O","P","E","N","E","D","!"};

        System.out.println("\n");
        //the for loop to simulate animation
        for(int i=0;i<26;i++){
            System.out.print(Yellow+Italic+Logo[i]);
            try {
                Thread.sleep(100);//thread to simulate processing
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
        System.out.print(Restore);
        System.out.println("\n");

        int Counter = 0;//passed on to keep track of invalid option user inputs time, not to exceed two times
        UserInterface Interface = new UserInterface();
        Interface.processCommand(Counter);
        System.out.println("\n\n");

        //animates the string at the close of the system
        endOfSystem();

    }

    //animate Logo at when closing the system
    public static void endOfSystem(){

        // text to be animated
        String[] Logo={"M","A","T","H"," ","M","A","S","T","E","R"," ","S","Y","S","T","E","M"," ","C","L","O","S","E","D","!"};

        //Declaring Formatting variables
        String Cyan = "\u001B[36m";
        String Green = "\u001B[32m";
        String Restore = "\u001b[0m";
        String Red = "\u001B[31m";
        String Italic = "\033[3m";
        String Yellow="\u001B[33m";

        //the for loop to simulate animation
        for(int i=0;i<26;i++){
          System.out.print(Yellow+Italic+Logo[i]);
            try {
                Thread.sleep(100);//thread to simulate processing
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }
        System.out.print(Restore);
    }
}
// Question class 






//Challenge class 



//User class 





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

       
        ArrayList<PupilToFile> pupilToFiles = new ArrayList<>();
        try {
            //sending request to the server

            OOS.writeObject(Command);

            //error catch
            if (Counter == 1) {
                System.err.print(" ONE MORE TRIAL REMAINING......\n\n");
                Thread.sleep(1000);
            }

            //listening for the servers response
            pupilToFiles = (ArrayList<PupilToFile>) OIS.readObject();
            if (pupilToFiles.isEmpty()) {
                System.err.println("-----No Applicants Yet!-----");

                Thread.sleep(100);

            } else {
                Iterator<PupilToFile> pupilToFileIterator = pupilToFiles.iterator();
                while (pupilToFileIterator.hasNext()) {
                    PupilToFile pupilToFile = pupilToFileIterator.next();
                    System.out.println("\n\n" + Cyan + pupilToFile + Restore);
                }


                verifyMoreParticipants(pupilToFiles, OIS, OOS, Counter);
            }
        } catch (IOException ex) {
            ex.printStackTrace();
        } catch (InterruptedException ex) {
            ex.printStackTrace();
        } catch (ClassNotFoundException ex) {
            ex.printStackTrace();
        }
    }

    public void verifyMoreParticipants(ArrayList<PupilToFile> pupilToFiles, ObjectInputStream OIS, ObjectOutputStream OOS, int Counter) {
        Scanner input = new Scanner(System.in);
        FileManagement fileManagement=new FileManagement();

        //Declaring Formatting variables
        String Cyan = "\u001B[36m";
        String Green = "\u001B[32m";
        String Restore = "\u001b[0m";
        String Red = "\u001B[31m";
        String Italic = "\033[3m";
        String Yellow="\u001B[33m";

        String FeedBack, Request, Command;
        try {
            System.out.print("\n+--You are to confirm and verify if the given applicant(s) belong to this school.--+" +
                    "\n" + Cyan + "Enter command like: "+Yellow+"[yes 'username'/'no username']\n" + Restore + "                 ");
           System.out.println(Green+Italic);
            Command = input.nextLine();
            System.out.println(Restore);

            //checking if the chosen pupil exist
            boolean Condition = checkingPupilObjectInArray(pupilToFiles, Command);
            if (Condition) {
                Iterator<PupilToFile> iterator = pupilToFiles.iterator();
                while (iterator.hasNext()) {
                    PupilToFile pupilToFile = iterator.next();
                    if (pupilToFile.NoCommand.equals(Command) || pupilToFile.YesCommand.equals(Command)) {
                        if (Command.equalsIgnoreCase(pupilToFile.NoCommand)) {
                            System.out.println("\nYou have selected:\n" + Red + pupilToFile);
                            System.out.print("\nAre sure to reject this person?"+Yellow+"[yes/no]\n               " + Restore);

                            System.out.print(Green);
                            Command = Input.nextLine();
                            System.out.print(Restore);

                            if (Command.equals("yes")) {
                                Request = "Reject";
                                OOS.writeObject(Request);

                                OOS.writeObject(pupilToFile);
                                iterator.remove();

                                //updating the file
                                fileManagement.AddRecordToFile("TextFile/MyFile1.text",pupilToFiles);
                                FeedBack = (String) OIS.readObject();
                                if (FeedBack.equalsIgnoreCase("Done")) {
                                    controlApplicantsVerification(pupilToFiles, OIS, OOS, Counter);
                                    break;
                                }
                            } else if (Command.equals("no")) {
                                controlApplicantsVerification(pupilToFiles, OIS, OOS, Counter);
                                break;
                            } else {
                                System.err.println("-----INVALID COMMAND!-----" +
                                        "\n Type the command as it appears.( consider the spaces and the letter case).");
                                Thread.sleep(1000);
                                controlApplicantsVerification(pupilToFiles, OIS, OOS, Counter);
                                break;
                            }
                        }
                        //if it is a yes command
                        else {
                            System.out.println("\nYou have selected:\n" + Cyan + pupilToFile);
                            System.out.println("\nAre sure to Accept this person?"+Yellow+"[yes/no]" + Restore);

                            System.out.print(Green);
                            Command = Input.nextLine();
                            System.out.print(Restore);

                            if (Command.equals("yes")) {

                                Request = "Accept";
                                OOS.writeObject(Request);
                                OOS.writeObject(pupilToFile);
                                iterator.remove();
                                fileManagement.AddRecordToFile("TextFile/MyFile1.text",pupilToFiles);
                                FeedBack = (String) OIS.readObject();
                                if (FeedBack.equalsIgnoreCase("Done")) {
                                    controlApplicantsVerification(pupilToFiles, OIS, OOS, Counter);
                                    break;
                                }
                            } else if (Command.equals("no")) {
                                controlApplicantsVerification(pupilToFiles, OIS, OOS, Counter);
                                break;
                            } else {
                                System.err.println("-----INVALID COMMAND!-----" +
                                        "\n Type the command as it appears.( consider the spaces and the letter case).");
                                controlApplicantsVerification(pupilToFiles, OIS, OOS, Counter);
                                        break;
                            }
                        }
                    }
                }
            }//the error if the rep input a wrong Pupil number
            else {
                System.err.println("-----THE PERSON YOU ENTERED DOES NOT EXIST!-----" +
                        "\n Type the command as it appears.( consider the spaces and the letter case)." +
                        "\n For example:[ yes xxx]\n\n");
                Thread.sleep(1000);
                controlApplicantsVerification(pupilToFiles, OIS, OOS, Counter);

            }
        } catch (IOException e) {
            e.printStackTrace();
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }

    // this function will check if the selected pupil exist in the schools list
    public boolean checkingPupilObjectInArray(ArrayList<PupilToFile> pupilToFiles, String Command) {
        Iterator<PupilToFile> iterator = pupilToFiles.iterator();
        while (iterator.hasNext()) {
            PupilToFile pupilToFile = iterator.next();
            if (pupilToFile.NoCommand.equals(Command) || pupilToFile.YesCommand.equals(Command)) {
                return true;
            }
        }
        return false;
    }

    //this is used to replay some actions in the verify participant function above
    public void controlApplicantsVerification(ArrayList<PupilToFile> pupilToFiles, ObjectInputStream OIS, ObjectOutputStream OOS, int Counter) {

        //Declaring Formatting variables
        String Cyan = "\u001B[36m";
        String Green = "\u001B[32m";
        String Restore = "\u001b[0m";
        String Red = "\u001B[31m";
        String Italic = "\033[3m";
        String Yellow="\u001B[33m";

        System.out.println(Green+"\n\nYou are left with:"+Restore);
        Iterator<PupilToFile> pupilToFileIterator = pupilToFiles.iterator();
        while (pupilToFileIterator.hasNext()) {
            PupilToFile pupilToFile = pupilToFileIterator.next();
            System.out.println("\n" + Cyan + pupilToFile + Restore);
        }

        String Command;

       while(true){
           if(pupilToFiles.isEmpty()){
               System.err.println("-----No Applicants left-----");
               try {
                   Thread.sleep(100);
               } catch (InterruptedException e) {
                   e.printStackTrace();
               }
               break;
           }
            System.out.println("Verify More Participants?"+Yellow+"[yes/no]"+Restore);

           System.out.print(Green+Italic);
            Command = Input.nextLine();
            System.out.print(Restore);

            if (Command.equals("yes")) {
                verifyMoreParticipants(pupilToFiles, OIS, OOS, Counter);
                break;
            } else if (Command.equals("no")) {
                break;
            }else{
                System.err.println("-----INVALID COMMAND!-----" +
                    "\n Type the command as it appears.( consider the spaces and the letter case)." +
                    "\n For example:[ yes xxx]\n\n");
                try {
                    Thread.sleep(1000);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }
                controlApplicantsVerification(pupilToFiles, OIS, OOS, Counter);
                break;
            }
        }
    }
}












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
                int i=0;


                String ChallengeNo="Challenge No",Challenge_Name="Challenge_Name",OpeningDate="Opening Date",ClosingDate="Closing Date",NumberOfQuestions="NumberOfQuestions",Status="Challenge Status",TimeAllowed="TimeAllowed";

                System.out.println(Cyan +"+--------------+-----------------+----------------------+----------------------+-------------+-------------------+-------------------------+"+Restore);
                System.out.printf("| %-10s | %-15s | %-20s | %-20s | %-10s | %-10s | %-20s    |\n",ChallengeNo,Challenge_Name,OpeningDate,ClosingDate,TimeAllowed,NumberOfQuestions,Status);
                System.out.println(Cyan +"+--------------+-----------------+----------------------+----------------------+-------------+-------------------+-------------------------+");

                for(Challenge challenge:challenges){
                    //defining the challenge status whether the challenge is open/pending or closed
                LocalDateTime localDateTime= LocalDateTime.now();
                LocalDateTime ClosinglocalDateTime=challenge.ClosingDate;
                LocalDateTime OpeningLocalDateTime=challenge.OpeningDate;

                if (localDateTime.isAfter(ClosinglocalDateTime)) {
                    challenge.Status = "Challenge Closed";
                } else if (localDateTime.isBefore(OpeningLocalDateTime)) {
                    challenge.Status = "Challenge Pending";
                }else {
                    challenge.Status = "Challenge Open";
                }

                    if (i>0) {
                        System.out.println("+--------------+-----------------+----------------------+----------------------+-------------+-------------------+-------------------------+");
                    }
                    System.out.println(challenge);
                    i++;
                }
                System.out.println("+--------------+-----------------+----------------------+----------------------+-------------+-------------------+-------------------------+");
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



    public void questionLoader(Socket socket, ObjectInputStream OIS, ObjectOutputStream OOS, int Counter, ArrayList<Challenge> challenges) {

        AtomicInteger Timer =new AtomicInteger(0);//this is to track the remaining time while attempting questions
        AtomicBoolean TerminateProcess=new AtomicBoolean(false);//this terminates the question loader and review process, but activates the logoutfuction

        String ChallengeID=null;

        if (Counter == 1) {
            System.err.print(" ONE MORE TRIAL REMAINING!......\n");
            try {
                Thread.sleep(1000);
            } catch (InterruptedException e) {
                e.printStackTrace();
            }
        }

        //creating a question arraylist object to hold questions loaded from the server
        ArrayList<Question> questions = new ArrayList<>();
        String Answer,NumberOfQuestions=null;


        //Declaring Formatting variables
        String Cyan = "\u001B[36m";
        String Green = "\u001B[32m";
        String Restore = "\u001b[0m";
        String Red = "\u001B[31m";
        String Italic = "\033[3m";
        String Yellow="\u001B[33m";

        String FeedBack, Request,Command;


            System.out.print("\n\n+-----Do you want to Attempt a challenge/Another challenge"+Yellow+"[yes/no]?"+Restore+"-------+\n              ");

            System.out.print(Green+Italic);
            Command = Input.nextLine();
            System.out.print(Restore);
            try {
            switch (Command) {
                case "yes":

                    System.out.print("\n+-----Enter " + Yellow + "[attempt challenge 'challenge number']----+\n              " + Restore);

                    System.out.print(Green + Italic);
                    Command = Input.nextLine();
                    System.out.print(Restore);

                    //checking if the chosen challenge exist
                    boolean Condition = checkingChallengeObjectInArray(challenges, Command);
                    String NumberOfQuestion=null;

                    if (Condition) {

                        Iterator<Challenge> iterator = challenges.iterator();
                        while (iterator.hasNext()) {
                            Challenge challenge = iterator.next();

                            if (challenge.AttemptCommand.equalsIgnoreCase(Command)) {

                                if (challenge.Status.equalsIgnoreCase("Challenge Closed")){

                                    System.err.println("-----This Challenge Was Closed!-----\n Select another challenge which is open. ");
                                    Thread.sleep(1000);//simulate processing for one second

                                    //calling the function question loader
                                    Counter = 0;
                                    questionLoader(socket, OIS, OOS, Counter, challenges);
                                    break;
                                }
                                else if(challenge.Status.equalsIgnoreCase("Challenge Pending")){

                                    System.err.println("-----This Challenge is not yet open!-----\n Select another challenge which is open. ");
                                    Thread.sleep(1000);//simulate processing for one second

                                    //calling the function question loader
                                    Counter = 0;
                                    questionLoader(socket, OIS, OOS, Counter, challenges);
                                    break;
                                }
                                else{

                                    //checking whether this challenge was once done by the pupil
                                    OOS.writeObject(challenge);
                                    FeedBack=(String)OIS.readObject();

                                    if(FeedBack.equalsIgnoreCase("already done")){
                                        System.err.println("-----You already attempted this challenge!-----\n Select another challenge which you have never attempted. ");
                                        Thread.sleep(1000);//simulate processing for one second

                                        //calling the function question loader
                                        Counter = 0;
                                        questionLoader(socket, OIS, OOS, Counter, challenges);
                                        break;
                                    }else {

                                        //capturing the ID for a selected challenge as to initialize the ChID of the submission later on
                                        ChallengeID = challenge.ID;

                                        Timer.set(Integer.parseInt(challenge.TimeAllowed));

                                        //intialising the number of questions to be loaded according to the challenge
                                        NumberOfQuestion = challenge.NumberOfQuestions;

                                        String ChallengeNo = "Challenge No", Challenge_Name = "Challenge_Name", OpeningDate = "Opening Date", ClosingDate = "Closing Date", TimeAllowed = "TimeAllowed", Status = "Challenge Status";
                                        NumberOfQuestions = "NumberOfQuestions";

                                        System.out.println("\n\n+-----You have Chosen to Attempt challenge:-----------+");
                                        System.out.println(Cyan + "+--------------+-----------------+----------------------+----------------------+-------------+-------------------+-------------------------+" + Restore);
                                        System.out.printf("| %-10s | %-15s | %-20s | %-20s | %-10s | %-10s | %-20s|\n", ChallengeNo, Challenge_Name, OpeningDate, ClosingDate, TimeAllowed, NumberOfQuestions, Status);
                                        System.out.println(Cyan + "+--------------+-----------------+----------------------+----------------------+-------------+-------------------+-------------------------+");
                                        System.out.println(challenge);
                                        System.out.println(Cyan + "+--------------+-----------------+----------------------+----------------------+-------------+-------------------+-------------------------+");

                                        System.out.println(Restore);
                                    }
                                }
                            }
                        }

                        System.out.print("+-----Are you sure to Start the Challenge?" + Yellow + "[yes/no]----+\n" + Restore + "               ");

                        System.out.print(Green + Italic);
                        Command = Input.nextLine();
                        System.out.print(Restore);


                        //checks whether reply is "Yes" or " no"
                        if (Command.equals("yes")) {
                            System.out.println();
                            Request = "Loadquestions "+NumberOfQuestion;
                            OOS.writeObject(Request);

                            //receiving and evaluating feedback from the server
                            FeedBack = (String) OIS.readObject();
                            if (FeedBack.equalsIgnoreCase("No results Found")) {
                                System.err.println("Questions Are not yet Uploaded! Try again Later.");

                                Thread.sleep(1000);//simulate processing for one second

                                Counter = 0;
                                logoutHandler(socket, OIS, OOS, Counter, challenges);
                                break;
                            } else {
                                System.out.println(Cyan + "+-----INSTRUCTIONS:-----+\n 1). Correct Answer Score:3mks\n 2). Wrong Answer score:-3mks\n 3).+-----If you are unsure about the question, enter a minus(-):-0mks\n\n If you are Ready, Press   " + Yellow + "(enter key)" + Restore + Cyan + " to continue with the challenge-----+ " + Restore);

                                //Creating a pause for the Participant to read through the instructions and proceeds when he precess Enter
                                String ParticipantReadInstructions = Input.nextLine();

                                //if questions are present, thy are loaded in questions arraylist
                                questions = (ArrayList<Question>) OIS.readObject();

                                int TimeLimit = Timer.get();// to time for the entire challenge attempt(this is seconds)
                                int Questions = Integer.valueOf(NumberOfQuestion);//used in numbering of questions


                                //This thread simulate count down using the for loop and updating  the atomic integer by 1, after every second
                                new Thread(new Runnable() {
                                    int CurrentTime;
                                    int ModifiedTime;

                                    @Override
                                    public void run() {
                                        for (int i = TimeLimit; i > 0; i--) {
                                            CurrentTime = Timer.get();
                                            ModifiedTime = CurrentTime - 1;
                                            Timer.set(ModifiedTime);


                                            try {
                                                Thread.sleep(1000);
                                            } catch (InterruptedException e) {
                                                e.printStackTrace();
                                            }
                                        }


                                        System.out.println(Red + "\n\nTimeOut!\n" + Cyan + "Your attempts have been automatically submitted.\n\n+-----Press "+Yellow+"( Enter key )"+Restore+ Cyan+" to continue-----+" + Restore);
                                    }
                                }).start();


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

//Back Option Manager,manages the back process back when selected by the user.
public void back(int Counter){
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

          //evaluating server feedback after submission and generating respective responses to client
          FeedBack = (String) OIS.readObject();

          //if User submitted registration form
          if (ATS.FirstOption.equalsIgnoreCase("Register")) {
              if (FeedBack.equalsIgnoreCase("School Number Does Not Exist")) {
                  System.err.print("\n------The School Number is Incorrect!-----\n            RE-ENTER DETAILS");
                  try {
                      Thread.sleep(1000);
                  } catch (InterruptedException e) {
                      e.printStackTrace();
                  }

                  //Prompting the user to re-enter credentials after error Message
                  Counter = 0;
                  user.register(ATS.SecondOption, Counter, ATS.FirstOption);
              } else if (FeedBack.equalsIgnoreCase("Once Rejected")) {
                  System.err.println("\n-----Your ID was once rejected on this Particular School!-----" +
                          "\n You may Re-load and Register on your Current School which is Verified in our System" +
                          "\n Thank you!");
                  try {
                      Thread.sleep(1000);
                  } catch (InterruptedException e) {
                      e.printStackTrace();
                  }
                  break;
              } else if (FeedBack.equalsIgnoreCase("Recognised") || FeedBack.equalsIgnoreCase("Registration Pending")) {
                  System.out.println("\n" + Cyan + " Your Registration is Pending!\n You will receive a confirmation E-mail.\n THANK YOU! ");
                  System.out.print(Restore);
                  break;
              } else if (FeedBack.equalsIgnoreCase("Not Recognised")) {
                  System.err.println("\n-----Your Representative ID does not Match Any Record!-----\n            RE-ENTER DETAILS");
                  try {
                      Thread.sleep(1000);
                  } catch (InterruptedException e) {
                      e.printStackTrace();
                  }

                  //Prompting the user to re-enter credentials after error Message
                  Counter = 0;
                  user.register(ATS.SecondOption, Counter, ATS.FirstOption);

              }
          }
        
           // if it was User login submission
           else {
            if (FeedBack.equalsIgnoreCase("Invalid Credentials")) {
                System.err.println("\n-----Invalid UserName Or Password!-----\n            RE-ENTER DETAILS");
                try {
                    Thread.sleep(1000);
                } catch (InterruptedException e) {
                    e.printStackTrace();
                }

                //Prompting the user to re-enter credentials after error Message
                Counter = 0;
                user.login(ATS.SecondOption, Counter, ATS.FirstOption);
            } else {
                System.out.println("\n" + Cyan + "  Login SuccessFull!\n");
                System.out.print(Restore);

                //executes  afterloginmanager if it was successful user registration. it will evaluate if it was a schoolrep or a participant(pupil)
                Counter = 0;
                afterLoginManager(ATS.SecondOption, Counter, this.socket, this.OIS,this.OOS);
                break;
            }
            break;
        }
    } catch (UnknownHostException e) {
        e.printStackTrace();
        break;
    } catch (IOException e) {
        e.printStackTrace();
    } catch (ClassNotFoundException e) {
        e.printStackTrace();
    }
}

//if it was a no submission
else if (Command.equals("no")) {
    System.err.print("-----Submission declined!-----");
    break;
} else {
    System.err.println("-----INVALID OPTION, SUBMISSION CLOSED!-----\n  You may access this System later.\n  Thank you!");
    break;
}
break;
default:
try {
    Counter++;
    System.err.println("-----Invalid Entry!-----");
    Thread.sleep(1000);
    if (Counter == 2) {
        System.err.println(" Exceeded maximum trials!!\n Try again Later, thank you. ");
        break;
    }
    submitDetails(Counter, FirstOption, SecondOption, ID, SchoolNumber, FirstName, LastName, UserName, DOB, Email, Password,ImageData,ImagePath);
    break;
} catch (InterruptedException e) {
    e.printStackTrace();
}
          }
}

// it manages the processes after login
public void afterLoginManager (String SecondOption,int Counter, Socket socket,ObjectInputStream OIS, ObjectOutputStream OOS){

    //Declaring Formatting variables
    String Cyan = "\u001B[36m";
    String Green = "\u001B[32m";
    String Restore = "\u001b[0m";
    String Red = "\u001B[31m";
    String Italic = "\033[3m";
    String Yellow="\u001B[33m";


    Pupil pupil=new Pupil();
    if (Counter == 1) {
        System.err.print(" ONE MORE TRIAL REMAINING......\n\n");
        try {
            Thread.sleep(1000);
        } catch (InterruptedException e) {
            e.printStackTrace();
        }
    }
    Scanner input = new Scanner(System.in);
    String Command;
    if (SecondOption == "Pupil") {
        System.out.println("+---------------------------------------------+");
        System.out.println("+ ENTER ( view challenges) TO VIEW CHALLENGES +");
        System.out.println("+---------------------------------------------+");
        System.out.print(" Enter: ");

        System.out.print(Green+Italic);
        Command = input.nextLine();
        System.out.print(Restore);

            switch (Command) {
                case "view challenges":
                    Counter = 0;
                    pupil.viewChallenge(socket,OIS,OOS,Counter);
                    break;
                default:
                    Counter++;
                    System.err.println("-----Invalid Entry!-----");
                    try {
                        Thread.sleep(1000);
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                    if (Counter == 2) {
                        System.err.println(" Exceeded maximum trials!!\n Try again Later, thank you! ");
                        break;
                    }
                    afterLoginManager(SecondOption, Counter, socket, OIS,OOS);
            }

        }

    //If it is a representative login
    else {
            System.out.println("+-------------------------------------------+");
            System.out.println("+ ENTER (view applicants) TO VIEW APPLICANT +");
            System.out.println("+-------------------------------------------+");
            System.out.print(" Enter: ");
            System.out.print(Green+Italic);
            Command = input.nextLine();
            System.out.print(Restore);

            switch (Command) {
                case "view applicants":
                    Counter = 0;
                    Rep.viewApplicant(OIS,OOS,Counter,Command);
                    break;
                default:
                    Counter++;
                    System.err.println("-----Invalid Entry!-----");
                    try {
                        Thread.sleep(100);
                    } catch (InterruptedException e) {
                        e.printStackTrace();
                    }
                    if (Counter == 2) {
                        System.err.println(" Exceeded maximum trials!!\n Try again Later, thank you! ");
                        break;
                    }
                    afterLoginManager(SecondOption, Counter, socket,OIS,OOS);
            }
        }
    }
}

class AttributesTobeSubmited implements Serializable{
    String ID;
    String YesCommand="yes "+ID;
    String NoCommand="no "+ID;
    String FirstOption;
    String SecondOption;

    String SchoolNumber;
    String FirstName;
    String LastName;
    String UserName;
    String DOB;
    String Email;

    String Password;
    byte[] ImageData;

    String FilePath;
    public AttributesTobeSubmited(String FirstOption,String SecondOption,String ID,String SchoolNumber,String FirstName,String LastName,String UserName,String DOB,String Email,String Password,byte[] ImageData,String FilePath){
        this.FirstOption=FirstOption;
        this.SecondOption=SecondOption;
        this.ID=ID;
        this.SchoolNumber=SchoolNumber;
        this.FirstName=FirstName;
        this.LastName=LastName;
        this.UserName=UserName;
        this.DOB=DOB;
        this.Email=Email;
        this.Password=Password;
        this.ImageData=ImageData;
        this.FilePath=FilePath;
    }

    public String toString(){
        return ID+"\n"+FirstName+" "+LastName+"\n";
    }
}
