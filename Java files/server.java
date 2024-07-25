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
            }        }
    }
    public static void main(String[] fk) throws IOException {
        ServerSocket SS=new ServerSocket(1111);
        Servers servers=new Servers(SS);
        servers.startServer();

    }
}


/*try {
ServerSocket SS = new ServerSocket(1111);
Socket socket = SS.accept();
OutputStreamWriter OSW = new OutputStreamWriter(socket.getOutputStream());
//InputStreamReader ISR= new InputStreamReader(socket.getInputStream());
//BufferedReader BR=new BufferedReader(ISR);
BufferedWriter BW = new BufferedWriter(OSW);
ObjectInputStream OIS = new ObjectInputStream(socket.getInputStream());
AttributesTobeSubmited ATS = (AttributesTobeSubmited) OIS.readObject();
            System.out.println(" 1). " + ATS.FirstOption + "\n 2). " + ATS.SecondOption + "\n 3). " + ATS.ID + "\n 4). " + ATS.SchoolNumber + "\n 5). " + ATS.FirstName + "\n 6). " + ATS.LastName + "\n 7). " + ATS.UserName + "\n 8). " + ATS.DOB + "\n 9). " + ATS.Email + "\n 10). " + ATS.Password + "\n\n");

            if(ATS.FirstOption =="Register") {
        BW.write("you will receive a confirmation email ");
                BW.newLine();
                BW.flush();

                System.out.println("Checking whet her the school number matches any Number from the data base by retrieving all SchoolNumbers using the query" +
                                           "\nIf not match, Print to the client 'Your SchoolNumber is Invalid' then break;\n and then load FirstOption " +
                                           "\n if match, continue"); //Your SchoolNumber is Invalid: needs to be tracked.
                System.out.println("A Query Return 'File Name That Correspond to the Respective SchoolNumber From the SchRep table" +
                                           "\n and assign it to a variable MyFile");
String FileName = "MyFile1.text";// variable+".text"
                if (ATS.SecondOption == "Pupil") {
//String S = null;
PrintWriter P = new PrintWriter(new FileWriter(FileName, true), true);
                    P.print(ATS.FirstOption + "\n" + ATS.SecondOption + "\n" + ATS.ID + "\n" + ATS.SchoolNumber + "\n" + ATS.FirstName + "\n" + ATS.LastName + "\n" + ATS.UserName + "\n" + ATS.DOB + "\n" + ATS.Email + "\n" + ATS.Password + "\n");
                    P.println();
                    P.close();
//System.out.println("Server Replies, 'you will receive a confirmation email'" +// You will Receive a confirmation: need to be tracked
// "\n if A server receives ''");
                }
                        }
                        }catch (IOException e) {
        e.printStackTrace();
        } catch (ClassNotFoundException e) {
        e.printStackTrace();

    }
    /*public void feedBack(String FeedBack){
        ServerSocket SS = new ServerSocket(1111);
        Socket socket = SS.accept();
        Socket socket=new Socket()

        OutputStreamWriter OSW =new OutputStreamWriter(socket.getOutputStream());
        //InputStreamReader ISR= new InputStreamReader(socket.getInputStream());
        //BufferedReader BR=new BufferedReader(ISR);
        BufferedWriter BW=new BufferedWriter(OSW);
        BW.write("you will receive a confirmation email ");
        BW.newLine();
        BW.flush();

    }*/