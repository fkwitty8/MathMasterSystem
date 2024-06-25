import java.time.*;
import java.util.*;
public class JavaUserCommandLine {
    public static void main(String[] args) {
        int Counter = 0;//passed on to keep track of invalid option user inputs time, not to exceed two times
        UserInterface Interface = new UserInterface();
        Interface.firstOptionManagement(Counter);
    }
}
class Challenge{
    String ChallengeNumber;
    String ChallengeName;
}


//super class
class User {
    String ID;
    String SchoolNumber;
    String FirstName;
    String LastName;
    String UserName;
    LocalDate DOB;
    String Email;
    String Status =null;
    String Password;
    Scanner Input = new Scanner(System.in);
    Challenge challenge=new Challenge();

    public void register(String OptionWord, int Counter,String FirstOption) {
        int Control=1;
        if (Counter == 1) {
            System.out.print(" \n\nONE MORE TRIAL REMAINING......\n\n");
        }
        UserInterface userinterface=new UserInterface();
        Scanner Input = new Scanner(System.in);
        switch (Control){
            case 1:
                if(Counter!=2) {
                    System.out.print("\n\n+-----Enter your " + OptionWord + " ID-----+\n              ");
                    this.ID = Input.nextLine();
                    System.out.print("+-----Enter your School Number:-----+\n              ");
                    this.SchoolNumber = Input.nextLine();
                    System.out.print("+-----Enter your " + OptionWord + " FirstName-----+\n             ");
                    this.FirstName = Input.nextLine();
                    System.out.print("+-----Enter your " + OptionWord + " LastName-----+\n              ");
                    this.LastName = Input.nextLine();
                    System.out.print("+-----Enter your " + OptionWord + " UserName-----+\n              ");
                    this.UserName = Input.nextLine();
                    /*System.out.print("+-----Enter your " + OptionWord + " Date Of Birth('YYYY-MM-DD')-----+\n              ");
                    String date = Input.nextLine();
                    try {
                        this.DOB = LocalDate.parse(date, DateTimeFormatter.ofPattern("YYYY-MM-DD"));
                    } catch (Exception e) {
                        System.out.println("Error: You entered a Wrong Date format: use('YYYY-MM-DD').\n Thank you!");
                        Counter++;
                        register(OptionWord, Counter, FirstOption);
                    } finally {
                        Input.close();
                    }*/
                    System.out.print("+-----Enter your "+OptionWord + " Email Address-----+\n              ");
                    this.Email = Input.nextLine();
                    System.out.print("+-----Enter your " + OptionWord + " Password-----+\n              ");
                    this.Password = Input.nextLine();
                    userinterface.submitDetails(Counter,FirstOption,OptionWord,this.ID,this.SchoolNumber,this.FirstName,this.LastName,this.UserName,this.DOB,this.Email,this.Password);
                    // System.out.println(" 1)."+OptionWord+"\n  2)."+this.Id+"\n  4)."+this.Name+"\n  5)."+this.SchoolNumber+"\n  6)."+this.Password);
                    Counter=0;
                    break;
                }
                else{
                    break;
                }
        }
    }

    public void login(String OptionWord, int Counter,String FirstOption) {
        UserInterface userinterface=new UserInterface();
        Scanner Input = new Scanner(System.in);
        System.out.println("\n\n\n+-------------------------+|");
        System.out.println("+ " + OptionWord + " login");
        System.out.println("+-------------------------+|");
        System.out.print("+-----Enter your " + OptionWord + " ID-----+\n              ");
        this.ID = Input.nextLine();
        System.out.print("+-----Enter your " + OptionWord + " Password-----+\n              ");
        this.Password = Input.nextLine();
        userinterface.submitDetails(Counter,FirstOption,OptionWord,this.ID,this.SchoolNumber,this.FirstName,this.LastName,this.UserName,this.DOB,this.Email,this.Password);
        Counter=0;
    }
    public void viewChallenge(){
        System.out.println("Display Challenges from the data base");
    }

    public void uploadImage() {
        System.out.println("Upload image");
    }
}
class Administrator extends User {
    public void viewChallenge() {
        System.out.println("viewchallenge");
    }
}

class SchoolRep extends User {
    public void viewChallenge() {
        System.out.println("viewchallenge");
    }
}
class Pupil extends User{
    public void viewChallenge( int Counter) {
        int Option;
        if (Counter == 1) {
            System.out.print(" ONE MORE TRIAL REMAINING......\n\n");
        }
        System.out.println("Run Query that returns the challenges details\n ChallengeID\n Name:\n Date/time Span:\n");
        System.out.print("\n-----Enter the Challenge's Number that you want to attempt----- \n              ");
        challenge.ChallengeNumber = Input.nextLine();
        System.out.print("\nSelect An Option:\n 1).Attempt the Challenge\n 2).Close\nSelected Option: ");
        Option = Input.nextInt();
        switch (Option) {
            case 1:
                if(Option==1) {
                    System.out.print("Are you sure to Start the Challenge?\n 1). Yes\n 0). No \n Select Option: ");
                    int Reply = Input.nextInt();
                    //checks whether reply is "Yes, submit" or " not submit"
                    if (Reply == 1) {
                        System.out.println("\n Load 10 Random Questions from the 100Qns In the database ");
                        break;
                    }
                    else if(Reply==0){
                        System.out.println(" You have Chosen No\n  CHALLENGE CLOSED!\n You may access the challenge later, Thank you!");
                        break;
                    }
                    else{
                        System.out.println("-----INVALID OPTION, CHALLENGE CLOSED!-----\n      You may access this challenge later.\n      Thank you!");
                        break;
                    }
                }
                else if(Option==0) {
                    System.out.println(" CLOSED!");
                    break;
                }
                else{
                    System.out.println("-----INVALID OPTION, CHALLENGE CLOSED!-----\n      You may access this challenge later.\n      Thank you!");
                    break;
                }
            case 2:
                System.out.println(" CLOSED!");
                break;
            default:
                System.out.println("-----INVALID OPTION!-----\n\n");
                Counter++;
                if (Counter == 2) {
                    System.out.println(" Exceeded maximum trials!!\n Try again Later, thank you. ");
                    break;
                }
                viewChallenge(Counter);
        }
    }
}


//initial CLI user interface management class
class UserInterface {
    Scanner Input= new Scanner(System.in);
    Administrator Admin=new Administrator();
    Pupil pupil=new Pupil();
    User user=new User();
    SchoolRep Rep=new SchoolRep();
    int Option; String FirstOption, SecondOption;
    String OptionWord= null;

    //displays and manages initial screen prompts
    public void firstOptionManagement(int Counter) {
        if (Counter==1) {
            System.out.print("ONE MORE TRIAL REMAINING......\n\n");
        }
        System.out.println("+------------------------------+");
        System.out.println("+ SELECT ANY OPTION AND PROCEED+");
        System.out.println("+------------------------------+");
        System.out.println(" 1). Register\n 2). Login\n 3). ViewChallenge");
        System.out.print("\nSelected Option: ");
        Option = Input.nextInt();
        if (Option == 1) {
            OptionWord = "Register";
        } else if (Option == 2) {
            OptionWord = "Login";
        } else if (Option == 3) {
            OptionWord = "ViewChallenge";
        }
            switch (Option) {
                case 1:
                    secondOptionManagement(Option, OptionWord,Counter);
                    break;
                case 2:
                    secondOptionManagement(Option, OptionWord,Counter);
                    break;
                case  3:
                    System.out.println(" You have choosen "+OptionWord+"!");
                    user.viewChallenge();
                    break;
                default://capture the invalid user inputs upto max of TWO TIMES.
                    System.out.println("-----INVALID OPTION!-----\n\n");
                    Counter++;
                    if (Counter == 2) {
                        System.out.println(" Exceeded maximum trials!!\n Try again Later, thank you. ");
                        System.out.flush();
                        break;
                    }
                    firstOptionManagement(Counter);
            }
        }

        // dispalys and manages second Options prompts
    public  void secondOptionManagement(int Option, String OptionWord,int Counter){
        Counter=0;
        String FirstOptionWord=OptionWord;
        System.out.println(" You have chosen "+OptionWord+"!") ;
        System.out.println("\n\n\n+-------------------------+|");
        System.out.println("+ "+OptionWord+" as:");
        System.out.println("+-------------------------+|");
        System.out.print(" 1). School Representative \n 2). Pupil\n 0). Back\n\nSelect Option: ") ;
        Option= Input.nextInt();
        System.out.print(" You have chosen, "+OptionWord+" as ") ;
        if(Option==1){
                SecondOption="School Representative";
	        }
	        else if(Option==2){
                SecondOption="Pupil";
	        }
            else if(Option==0){
                SecondOption="Back";
            }
        System.out.println(SecondOption+".") ;
            if(FirstOptionWord=="Register") {
                switch (Option) {
                    case 1:
                        //calling register method of schoolRepresentative class
                       Rep.register(SecondOption,Counter,FirstOptionWord);
                        break;
                    case 2:
                        //calling register method of pupil class
                        pupil.register(SecondOption,Counter,FirstOptionWord);
                        break;
                    case 0:
                        back(Counter);
                    default:
                        System.out.println("-----INVALID OPTION!-----\n\n    ");
                        System.out.flush();
                        Counter++;
                        if (Counter == 2) {
                            System.out.println(" Exceeded maximum trials!!\n Try again Later, thank you. ");
                            break;
                        }
                        firstOptionManagement(Counter);
                }
            }
            else if(FirstOptionWord=="Login"){
                switch (Option) {
                    case 1:
                        Rep.login(SecondOption,Counter,FirstOptionWord);
                       // submitDetails(Counter,FirstOptionWord,SecondOption,user.Id,user.Name,user.SchoolNumber,user.Password);
                        break;
                    case 2:
                        pupil.login(SecondOption,Counter,FirstOptionWord);
                        //submitDetails(Counter,FirstOptionWord,SecondOption,user.Id,user.Name,user.SchoolNumber,user.Password);
                        break;
                    case 0:
                        back(Counter);
                    default:
                        System.out.println("-----INVALID OPTION!-----\n\n");
                        Counter++;
                        if (Counter == 2) {
                            System.out.println(" Exceeded maximum trials!!\n Try again Later, thank you. ");
                            break;
                        }
                        firstOptionManagement(Counter);
                }
            }

    }

    //Back Option Manager,manages the back process back when selected by the user.
    public void back(int Counter){
        Counter=0;
        //System.out.println(" Clear Screen");
        firstOptionManagement(Counter);
    }
    public void submitDetails(int Counter,String FirstOption,String SecondOption,String ID,String SchoolNumber,String FirstName,String LastName,String UserName,LocalDate DOB,String Email,String Password){
        int Submit;
        if (Counter==1) {
            System.out.print(" ONE MORE TRIAL REMAINING......\n\n");
        }
        System.out.print("\n+-----Enter(1) to submit-----+\n                ");
        Submit=Input.nextInt();

        //checking the input whether its "submit" or "invalid input"
        switch(Submit){
            case 1:
                System.out.print("Are you sure to Submit?\n 1). Yes\n 0). No \n Select Option: ");
                int Reply=Input.nextInt();
                //checks whether reply is "Yes, submit" or " not submit"
                if(Reply==1) {
                    System.out.println("\nCreate a Java File having these fields and Send to the java server... ");

                    // this code below is to be put at the server side in the function that receive these variables.
                    // check whether the first option selected was either "login" or" Register" to create th relevant fields on the java file
                    //after these variables are all passed to function at the server which
                    if(FirstOption=="Register") {
                        System.out.println(" 1). " + FirstOption + "\n 2). " + SecondOption + "\n 3). " + ID + "\n 4). " + SchoolNumber +"\n 5). " + FirstName + "\n 6). " + LastName + "\n 7). " + UserName +"\n 8). " + DOB + "\n 9). " + Email+"\n 10). " +Password+"\n\n");
                        System.out.println("First checks first option: if its register/ or login/ view challenges:" +
                                "\n for register,\nFirst checks whether the school number matches the ones in the data:\n by use of a query that retrieves the all school numbers from the SchRep table.\n\n after, it compares if with the Schoolnumber from the file if it matchesany of those retrieved " +
                                "if they don't match,return an error message: \n\n Wrong SchNumber, reenter a correct one and break;\n\n if it matches any,\n\n " +
                                "\n \\n check for the second option: if its representative/ pupil:\n for pupil ,it retreives the students numbers from the rejected Table, then:\n  it compares if the Student Number matches any from the reject table" +
                                "if they match:\n return message to client that:YOU WERE ONCE REJECTED \n\n if match with any, check the school Number and append information to the respective file since each file shall belong to a particular school" +
                                "\n a respective SchRep client view the applicants and approve them only if logged in" +
                                "\nif yes/no feedback, do the needful and send necessary Email feedback to pupil  ");
                        System.out.println("waits for the email for a successful/unsuccessful registration");
                        break;
                    }
                    else if (FirstOption=="Login"){
                        System.out.println(" 1). " + FirstOption + "\n 2). " + SecondOption + "\n 3). " + ID + "\n 4). " + SchoolNumber +"\n 5). " + FirstName + "\n 6). " + LastName + "\n 7). " + UserName +"\n 8). " + DOB + "\n 9). " + Email+"\n 10). " +Password+"\n\n");
                        System.out.print("Compare the data() with that in the database for login");//first retrieve the passwords/registartionNo for the registered pupil and then compare.
                        System.out.print("after compoaring, CLEAR SCREEN and display you are logged in");
                        Counter=0;
                        afterLoginManager(SecondOption,Counter);
                        break;
                    }
                    else {
                        System.out.print("querry data base to Retrieve the challenges available");
                        user.viewChallenge();
                        break;
                    }
                }

                else if(Reply==0){
                    System.out.print("-----Submission declined!-----");
                    break;
                }
                else {
                    System.out.println("-----INVALID OPTION, SUBMISSION CLOSED!-----\n      You may access this System later.\n      Thank you!");
                    break;
                }
            default:
            Counter++;
            System.out.println("-----Invalid Entry!-----");
            if (Counter == 2) {
                System.out.println(" Exceeded maximum trials!!\n Try again Later, thank you. ");
                break;

            }
            submitDetails(Counter,FirstOption,SecondOption,ID,SchoolNumber,FirstName,LastName,UserName,DOB,Email,Password);
            break;
        }
    }
    public void afterLoginManager(String SecondOption, int Counter){
        if (Counter==1) {
            System.out.print(" ONE MORE TRIAL REMAINING......\n\n");
        }
        Scanner input=new Scanner(System.in);
        int ViewOption;
        if(SecondOption=="Pupil" ) {
            System.out.println("Display View Challenge with Prompt 'View Challenge'\n");
            System.out.println("+------------------------------+");
            System.out.println("+ ENTER (1) TO VIEW CHALLENGES +");
            System.out.println("+------------------------------+");
            System.out.print(" Enter(1): ");
            ViewOption=input.nextInt();
            switch(ViewOption) {
                case 1:
                    Counter=0;
                    pupil.viewChallenge(Counter);
                    break;
                default:
                    Counter++;
                    System.out.println("-----Invalid Entry!-----");
                    if (Counter == 2) {
                        System.out.println(" Exceeded maximum trials!!\n Try again Later, thank you. ");
                        break;
                    }
                    afterLoginManager(SecondOption,Counter);
            }

            System.out.println("retrieve challenges with their details. plus Option Attempt challenge or Back");
            System.out.println("if attempt challenge show start or cancel");
            System.out.println("if start, load random questions 1 by 1 with time attached to each question, if a participant is not sure of the question they enter a minus");
            System.out.println("if time is down, challenge is closed for the and the report is generated for the user ");
        }
        else if (SecondOption=="Administartor"){
            System.out.println("Display View Applicant with Prompt 'View Appalicant'\n");
            System.out.println("Retrieve All Applicants(Name and Id) from that particular school, with CONFIRM applicant Option Below");//this queries the database where the school id of the Rep match with participant sschool
            System.out.println("Display, ARE APPLICANTS DONE: IF YES: Enter 1 to submit\n if NO: call step two ");
            System.out.println("for submit create a java file applicants info and send to the server'\n");//the serve checks the Comfirm message, if yes pupil id, add student details   to participants table
            }
        else{

        }
    }

}


