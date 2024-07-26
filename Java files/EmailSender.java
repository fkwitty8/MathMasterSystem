import javax.mail.*;
import javax.mail.internet.*;
import java.io.*;
import java.sql.*;
import java.util.*;
import com.itextpdf.text.*;
import com.itextpdf.text.pdf.PdfPTable;
import com.itextpdf.text.pdf.PdfWriter;

public class EmailSender {

    public void emailManagement(String EmailTo,String Subject,String Body,String Reason) {

        Properties properties = new Properties();

        properties.put("mail.smtp.host", "smtp.gmail.com");
        properties.put("mail.smtp.port", 587);
        properties.put("mail.smtp.auth", true);
        properties.put("mail.smtp.starttls.enable", true);
        properties.put("mail.transport.protocol", "smtp");
        properties.put("mail.debug", true);

        //creating up a session object
        Session session = Session.getDefaultInstance(properties, new Authenticator() {
            @Override
            protected PasswordAuthentication getPasswordAuthentication() {
                return new PasswordAuthentication("kiyimbafwitty@gmail.com", "zdbl kttd rmyn debz");
            }
        });

        try{
            MimeMessage message = new MimeMessage(session);

            if (Reason.equalsIgnoreCase("Not results")) {

                Address addressTo = new InternetAddress(EmailTo);
                message.setRecipient(Message.RecipientType.TO, addressTo);

                //setting up the body contents
                message.setSubject(Subject);
                message.setContent(Body,"text/html");

                //sending the email
                Transport.send(message);
                System.out.println("Email sent");

            }else if (Reason.equalsIgnoreCase("Results")) {
                QuestionToBeBroadCasted questionToBeBroadCasted;

                ArrayList<QuestionToBeBroadCasted> questionToBeBroadCasteds=new ArrayList<>();
                // connecting to the database
                Connection connection= DriverManager.getConnection("jdbc:mysql://localhost:3306/mathmasterchallenge","root","");

                //retrieving qn and Ans
                String Qn,Ans,Column,Column1,Column2,Table,Query;
                PreparedStatement statement;
                ResultSet resultSet;


                Column1 = "Qn";
                Column2="Ans";
                Table = "QnAns";
                Query = "select "+ Column1+","+Column2+" from "+Table;
                statement = connection.prepareStatement(Query);
                resultSet = statement.executeQuery();

                while (resultSet.next()){
                    Qn=resultSet.getString("Qn");
                    Ans=resultSet.getString("Ans");
                  questionToBeBroadCasteds.add(new QuestionToBeBroadCasted(Qn,Ans));
                }

                String QnAnsFilePath=qnansPdfGenerator(questionToBeBroadCasteds);

                //retrieving All emails
                 ArrayList<String>Emails=new ArrayList<>();
                String email;
                Column = "Email";
                Table = "Participant";
                Query = "Select " + Column +" from " + Table;
                statement = connection.prepareStatement(Query);
                resultSet = statement.executeQuery();

                while(resultSet.next()){
                    email=resultSet.getString(1);
                    Emails.add(email);
                }

                Iterator<String>emailIterator=Emails.iterator();

                while(emailIterator.hasNext())
                {
                    String emails=emailIterator.next();
                    Address addressTo = new InternetAddress(emails);
                    message.setRecipient(Message.RecipientType.TO, addressTo);
                    //setting up the message body
                    message.setSubject(Subject);
                    message.setContent(Body, "text/html");

                   // String QnAnsFilePath=qnansPdfGenerator(questionToBeBroadCasteds);

                    MimeMultipart mimeMultipart = new MimeMultipart();

                    MimeBodyPart attachment = new MimeBodyPart();
                    attachment.attachFile(new File(QnAnsFilePath));

                    MimeBodyPart messageBody = new MimeBodyPart();
                    messageBody.setContent(Body, "text/html");
                    mimeMultipart.addBodyPart(messageBody);
                    mimeMultipart.addBodyPart(attachment);

                    message.setContent(mimeMultipart);

                    //sending the email
                    Transport.send(message);
                    System.out.println("Email sent");
                }
            }
        } catch (AddressException e) {
            e.printStackTrace();
        } catch (MessagingException e) {
            e.printStackTrace();
        }  catch (SQLException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }

    }


    public String qnansPdfGenerator(ArrayList<QuestionToBeBroadCasted>questionToBeBroadCasteds){
        String FileName="TextFile/MarkingGuide.pdf";

        //creating the pdf document object
        Document document=new Document();

        System.out.println("Pdf using itext!");

        try{
        PdfWriter pdfWriter = PdfWriter.getInstance(document, new FileOutputStream(new File(FileName)));

        //opening the document
        document.open();

        //adding pdf attributes title,creation day,author
        document.addAuthor("Okay Java");
        document.addCreationDate();
        document.addProducer();
        document.addCreator("fahad");
        document.addTitle("performance");
        document.addSubject("general performance");
        document.addKeywords("okay java, itext pdf");

        //creating a font formating
        Font font=FontFactory.getFont(FontFactory.COURIER_BOLD,14,BaseColor.BLUE);

        //paragraph class
        String MultiLineText="The following are the questions and the answer for all challenges set this year We appreciate you for being part!";
        Paragraph paragraph=new Paragraph(MultiLineText,font);

        PdfPTable table=new PdfPTable(2);

        for(QuestionToBeBroadCasted question:questionToBeBroadCasteds){
            table.addCell(question.Qn);
            table.addCell(question.Ans);
        }

        document.add(paragraph);
        document.add(table);
        document.close();
        return FileName;
        } catch (DocumentException e) {
            e.printStackTrace();
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        }
        return  null;
    }
}



class QuestionToBeBroadCasted{
    String Ans;
    String Qn;
    QuestionToBeBroadCasted(String Qn,String Ans){
        this.Qn=Qn;
        this.Ans=Ans;
    }

}


