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
