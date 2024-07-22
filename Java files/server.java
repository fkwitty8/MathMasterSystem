import java.net.*;
import java.io.*;

public class Servers {
    //public static int NumberOfConnectedUsers=0;
    ServerSocket SS;
    Servers(ServerSocket socket){
        this.SS=socket;
    }
    public void startServer(){
            while(true){
            try {
                Socket socket = SS.accept();
                //this.NumberOfConnectedUsers=NumberOfConnectedUsers+1;
                System.out.println(" Client connected!");
                ClientHandler0 CH0=new ClientHandler0(socket);
                Thread thread=new Thread(CH0);
                thread.start();
            } catch (IOException e) {
                e.printStackTrace();
            }
        }
    }
    public static void main(String[] fk) throws IOException {
        ServerSocket SS=new ServerSocket(1111);
        Servers servers=new Servers(SS);
        servers.startServer();

    }
}


