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

