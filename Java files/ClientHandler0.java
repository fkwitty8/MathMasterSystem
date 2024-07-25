import javax.imageio.ImageIO;
import java.awt.image.BufferedImage;
import java.net.*;
import java.io.*;
import java.sql.*;
import java.time.LocalDate;
import java.time.LocalDateTime;
import java.util.*;
public class ClientHandler0 implements Runnable {
    public static ArrayList<ClientHandler0> clientHandler0s = new ArrayList<>();
    static ArrayList<PupilToFile> Pupils = new ArrayList<>();
    //EmailSender emailSender;

    AttributesTobeSubmited ATS;
    Socket socket;
    ObjectOutputStream OOS;
    ObjectInputStream OIS;
    ClientHandler0(Socket socket) {
        try {
            this.socket = socket;
            this.OIS = new ObjectInputStream(this.socket.getInputStream());
            this.OOS = new ObjectOutputStream(this.socket.getOutputStream());
            this.ATS = (AttributesTobeSubmited) OIS.readObject();
            //emailSender=new EmailSender();
            this.clientHandler0s.add(this);

        } catch (IOException e) {
            closeConnection(ATS.FirstName, ATS.LastName);
        } catch (ClassNotFoundException e) {
            throw new RuntimeException(e);
        }
    }

    // the run method that executes when the client handler is called/ started
    @Override
    public void run() {
        sendToClient();
    }

    public void sendToClient() {
        ArrayList<Question>QuestionsToBeAttempted=new ArrayList<>();
        ArrayList<Question>questions1=new ArrayList<>();
        ArrayList<Challenge>challenges=new ArrayList<>();
        String SchoolRegNo=null;
        String ID;
        String Qn;
        String Ans;
        LocalDateTime OpeningDate;
        LocalDateTime ClosingDate;
        String TimeAllowed;
        String ChallengeStatus;
        String Request=null;
        String FeedBack=null;
        String Query=null;
        String Column=null;
        String Column1=null;
        String Column2=null;
        String Column3=null;
        String Column4=null;
        String Column5=null;
        String Column6=null;
        String Column7=null;
        String Table=null;
        PreparedStatement statement=null;
        ResultSet resultSet=null;
        FileManagement fileManagement=  new FileManagement();
        EmailSender emailSender=new EmailSender();


        try {
            //connecting to the database
            Connection connection= DriverManager.getConnection("jdbc:mysql://localhost:3306/mathmasterchallenge","root","");

            //iterator to safely remove the current object when needed in the iteration
            Iterator<ClientHandler0> iterator = clientHandler0s.iterator();
            while (iterator.hasNext()) {

                ClientHandler0 clientHandler0 = iterator.next();

                // checking whether the school number is valid. this check is for both the Rep and the pupil
                if (clientHandler0.ATS.FirstOption.equalsIgnoreCase("Register")) {
                    if (clientHandler0.ATS.SecondOption.equalsIgnoreCase("pupil")){

                        Column = "schoolRegNo";
                        Column1 = "RepEmail";
                        Column2 = "UserName";
                        Table = "VerifiedSchoolRep";
                        Query = "select " + Column + "," + Column1 + "," + Column2 + " from " + Table + " where " + Column + " =? ";
                        statement = connection.prepareStatement(Query);
                        statement.setString(1, clientHandler0.ATS.SchoolNumber);
                        resultSet = statement.executeQuery();

                        if (resultSet.next()) {
                            String RepEmail = resultSet.getString("RepEmail");
                            String RepUserName = resultSet.getString("UserName");

                            Column = "PupilID";
                            Column1 = "SchoolRegNo";
                            Table = "rejectedpupil";
                            Query = "Select " + Column + " from " + Table + " where " + Column + " =?" + " && " + Column1 + "=? ";
                            statement = connection.prepareStatement(Query);
                            statement.setString(1, clientHandler0.ATS.ID);
                            statement.setString(2, clientHandler0.ATS.SchoolNumber);
                            resultSet = statement.executeQuery();


                            if (resultSet.next()) {
                                FeedBack = "Once Rejected";
                                OOS.writeObject(FeedBack);
                                //Servers.NumberOfConnectedUsers--;
                                iterator.remove();
                            } else {

                                PupilToFile pupilToFile = new PupilToFile();
                                pupilToFile.initializePupilToFile(clientHandler0);
                                this.Pupils.add(pupilToFile);

                                //Adding students record to file after first validation
                                fileManagement.AddRecordToFile("TextFile/MyFile1.text", Pupils);


                                FeedBack = "Registration Pending";

                                //sending the Email for Acceptance
                                String Subject = "NEW APPLICANT";
                                String Body = "<h1 style='color:blue'>Hello " + RepUserName + "!</h1><p> You have a new applicant to be approved in our system  </p><br><br><table style='border:1;bordercollapse:collapse'><tr><td>"+pupilToFile.FirstName+" "+pupilToFile.LastName+"</td><td>"+pupilToFile.ID+"</td></tr></table>";
                                String Reason = "Not results";

                                emailSender.emailManagement(RepEmail, Subject, Body, Reason);

                                OOS.writeObject(FeedBack);
                                OOS.flush();
                                //Servers.NumberOfConnectedUsers--;
                                iterator.remove();

                                try {
                                    Thread.sleep(3000);
                                } catch (InterruptedException e) {
                                    e.printStackTrace();
                                }
                            }


                        }