/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package seflab;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.util.concurrent.TimeUnit;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Jay
 */
public class VM {

    private String path;
    private String name;

    public VM(String path, String name) {
        this.path = path;
        this.name = name;
    }

    public String getPath() {
        return path;
    }

    public void setPath(String path) {
        this.path = path;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void run(String opdracht) {
        Runtime runtime = Runtime.getRuntime();
        Process process;
        try {
            process = runtime.exec(opdracht); // you might need the full path
            InputStream is = process.getInputStream();
            InputStreamReader isr = new InputStreamReader(is);
            BufferedReader br = new BufferedReader(isr);
            String line;

            while ((line = br.readLine()) != null) {
                System.out.println(line);
//            TimeUnit.SECONDS.sleep(1);
            }
        } catch (IOException ex) {
            Logger.getLogger(VM.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    public void vmImport(){
        String s = "\"C:\\Program Files\\Oracle\\VirtualBox\\VBoxManage.exe\" "
                + "import "
                + "\"" + getPath() + "\"";
        System.out.println("Importing VM");
        run(s);
    }

    public void vmStart(){
        String s = "\"C:\\Program Files\\Oracle\\VirtualBox\\VBoxManage.exe\" "
                + "startvm "
                + getName();
        System.out.println("Starting VM");
        run(s);
    }

    public void vmStop(){
        String s = "\"C:\\Program Files\\Oracle\\VirtualBox\\VBoxManage.exe\" "
                + "controlvm "
                + getName()
                + " poweroff";
        System.out.println("Stopping VM");
        run(s);
    }

    public void vmDelete(){
        String s = "\"C:\\Program Files\\Oracle\\VirtualBox\\VBoxManage.exe\" "
                + "unregistervm "
                + getName()
                + " --delete";
        System.out.println("Deleting VM");
        run(s);
    }
}
