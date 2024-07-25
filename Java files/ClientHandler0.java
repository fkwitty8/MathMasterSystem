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
