import java.io.*;
import java.util.ArrayList;
import java.util.Iterator;

class FileManagement {

    ObjectInputStream OIS;
    ObjectOutputStream OOS;
    FileInputStream FIS;
    FileOutputStream FOS;



    //this function returns a full directory file path where the image is stored
    public String addImageToFile(byte[]ImageData,String ImageFilePath,String SecondOption,String ID){
        String DirImagePath;
        try {
            if (SecondOption.equalsIgnoreCase("school representative")) {
                DirImagePath="SchoolRepImages/"+ImageFilePath;
                FOS = new FileOutputStream(DirImagePath);
                FOS.write(ImageData);
                System.out.println("pupil ImageFilePath in add Image");

                return DirImagePath;

            } else {
                DirImagePath="PupilImages/"+ID+ImageFilePath;
                FOS = new FileOutputStream(DirImagePath);
                System.out.println("pupil ImageFilePath in add Image");
                FOS.write(ImageData);

                return DirImagePath;

            }
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }


        return null;
    }

    public void AddRecordToFile(String FilePath, ArrayList<PupilToFile> Pupils) {
        try {

            //String TempFile="TextFile/MyFile1.text";
            // File OldFile=new File(FilePath);
            //File NewFile=new File(TempFile);

            //this.OIS = new ObjectInputStream(new FileInputStream(FilePath));
            this.OOS = new ObjectOutputStream(new FileOutputStream(FilePath));

//            Iterator<PupilToFile>iterator=Pupils.iterator();
//            while(iterator.hasNext()){
//                PupilToFile pupilToFile=iterator.next();
//                System.out.println(pupilToFile);
//            }
            OOS.writeObject(Pupils);
            //File Dump=new File(FilePath);NewFile.renameTo(Dump);
            // OldFile.delete();


        } catch (IOException e) {
            e.printStackTrace();
        }
    }

//    public void RecordToSchoolRep(){
//
//    }
//

    //called in the login part for the School rep
    public void addRecordToDataBase(String FileNameToRead, String Command) {
        try {
            this.OIS = new ObjectInputStream(new FileInputStream(FileNameToRead));
            ArrayList<PupilToFile> Pupils;
            int Line = 0;
            boolean Found = true;
            Pupils = (ArrayList<PupilToFile>) OIS.readObject();
            //System.out.println(Pupils);
            Iterator<PupilToFile> iterator = Pupils.iterator();
            while (iterator.hasNext()) {
                PupilToFile pupilToFile = iterator.next();
                if (Command.equals(pupilToFile.YesCommand)) {
                    System.out.println("Add to data base");
                    iterator.remove();
                    OOS.writeObject(Pupils);
                    OOS.flush();
                } else if (Command.equals(pupilToFile.NoCommand)) {
                    iterator.remove();
                    OOS.writeObject(Pupils);
                    OOS.flush();
                }
                //System.out.println(pupilToFile);
            }
        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }


    }

    public void removeRecord(String FilePath, String Command) {
        String TempFile = "TextFile/MyFile1.text";
        File OldFile = new File(FilePath);
        File NewFile = new File(TempFile);

        AttributesTobeSubmited ATS = null;
        int LineNo = 0;
        try {
            this.OIS = new ObjectInputStream(new FileInputStream(FilePath));
            this.OOS = new ObjectOutputStream(new FileOutputStream(TempFile));

            while ((ATS = (AttributesTobeSubmited) OIS.readObject()) != null) {
                LineNo++;

                if (Command != ATS.YesCommand || Command != ATS.NoCommand) {
                    OOS.writeObject(ATS);
                }

            }

            OOS.flush();
            OOS.close();
            OIS.close();
            OldFile.delete();
            File Dump = new File(FilePath);
            NewFile.renameTo(Dump);

        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }
    }



    //Updating pupil on the file
    public void updatePupilOnTheFile(String FilePath,ArrayList<PupilToFile>pupils,PupilToFile pupil){
        Iterator<PupilToFile>iterator=pupils.iterator();
        while(iterator.hasNext()){
            PupilToFile pupil1=iterator.next();
            if(pupil1.ID.equals(pupil.ID)){
                iterator.remove();
            }
        }

        System.out.println("ImageFilePath in update Pupil to file");

        AddRecordToFile(FilePath,pupils);

    }


    // called when login par for the school rep when clicks the view applicants
    public ArrayList<PupilToFile> readRecord(String FileNameToRead, String SchoolNumber) {
        try {
            this.OIS = new ObjectInputStream(new FileInputStream(FileNameToRead));
            ArrayList<PupilToFile> Pupils;
            ArrayList<PupilToFile>pupilToSchoolRep=new ArrayList<>();
            Pupils = (ArrayList<PupilToFile>) OIS.readObject();

            for(PupilToFile pupilToFile:Pupils) {
                if (pupilToFile.SchoolNumber.equals(SchoolNumber)) {

                    //adding pupil to the array list to be sent to school representative whose school number matches with that of the school rep
                    pupilToSchoolRep.add(pupilToFile);
                }
            }

            return pupilToSchoolRep;

        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        } catch (ClassNotFoundException e) {
            e.printStackTrace();
        }
        return null;
    }
}

