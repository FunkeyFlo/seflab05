/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ssh;

import ch.ethz.ssh2.Connection;
import ch.ethz.ssh2.Session;
import ch.ethz.ssh2.StreamGobbler;
import java.io.BufferedReader;
import java.io.File;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Jay
 */
public class ssh {
    String keyFile;
    String loadScript;
    
//        Declare hostname and Port
    final String hostname = "127.0.0.1";
    final int port = 2222;

    public ssh(String keyFile, String loadScript) {
        this.keyFile = "C:/Users/Jay/Documents/Seflab/test_data/" + keyFile;
        this.loadScript = loadScript;
    }

    public String getKeyFile() {
        return keyFile;
    }

    public String getLoadScript() {
        return loadScript;
    }

    public String getHostname() {
        return hostname;
    }

    public int getPort() {
        return port;
    }

    public void SSH() {
//          Declare keyfile path 
        File keyfile = new File(getKeyFile());
        try {
//          Create new connection  
            Connection conn = new Connection(hostname, port);
//          Open connection
            conn.connect();

//          Declare authentication (username, keyfile, password of keyfle)
            boolean isAuthenticated = conn.authenticateWithPublicKey("seflab", keyfile, "");
            if (isAuthenticated == false) {
                throw new IOException("Autentication failed");
            }

//          Create a new session
            Session sess = conn.openSession();
//          Start load script in session
            sess.execCommand(getLoadScript());

            InputStream stdout = new StreamGobbler(sess.getStdout());

            BufferedReader br = new BufferedReader(new InputStreamReader(stdout));
            String line;
            while ((line = br.readLine()) != null) {
                System.out.println(line);
            }

//          Close the session
            sess.close();

//          Close the connection
            conn.close();

        } catch (IOException ex) {
            Logger.getLogger(ssh.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
