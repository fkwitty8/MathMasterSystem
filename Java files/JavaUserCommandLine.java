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