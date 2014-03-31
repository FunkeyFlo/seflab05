/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package scheduler;

import java.io.File;
import java.util.Iterator;
import java.util.LinkedList;
import java.util.Queue;

/**
 *
 * @author Florentijn
 */
public class Scheduler {

   /**
    * @param args the command line arguments
    */
   public static void moveFile(String source, String destination) {
      try {

         File afile = new File(source);
         
         if (afile.renameTo(new File(destination))) {
            System.out.println("File is moved successful!");
         } else {
            System.out.println("File is failed to move!");
         }
         
      } catch (Exception e) {
         e.printStackTrace();
      }
   }

   public static void main(String[] args) {
      Queue fileQueue = new LinkedList();
      String folderPath = "C:\\Users\\Florentijn\\Documents\\GitHub\\seflab05\\SEFLab\\files\\";

      File folder = new File(folderPath);
      System.out.println("filelist:");
      for (int i = 0; i < folder.list().length; i++) {
         String fileName = folder.list()[i];
         System.out.println(fileName);
         File file = new File(fileName);
         fileQueue.add(file);
      }

      String desktopFolder = "C:\\Users\\Florentijn\\Desktop\\temp\\";
      Iterator<File> iter = fileQueue.iterator();
      while (iter.hasNext()) {
         File f1 = (File) fileQueue.poll();
         moveFile(folderPath + f1.getName(), desktopFolder + f1.getName());
      }
   }
}
