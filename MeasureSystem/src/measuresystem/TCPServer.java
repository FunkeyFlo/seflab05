package measuresystem;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
import java.io.*;
import java.net.*;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;

class TCPServer implements Runnable {

    @Override
    public void run() {
        try {
            startServer();
        } catch (IOException ex) {
            Logger.getLogger(TCPServer.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void startServer() throws IOException {
        ServerSocket server = new ServerSocket(6789);
        while (true) {
            try {
                ArrayList<String> parameters = new ArrayList<>();
                Socket connection = server.accept();
                ObjectInputStream inStream = new ObjectInputStream(
                        connection.getInputStream());
                parameters = (ArrayList) inStream.readObject();
                System.out.println(parameters.get(0) + "\n" + parameters.get(1));
            } catch (IOException ex) {
                Logger.getLogger(TCPServer.class.getName()).log(Level.SEVERE, null, ex);
            } catch (ClassNotFoundException ex) {
                Logger.getLogger(TCPServer.class.getName()).log(Level.SEVERE, null, ex);
            }
        }
    }
}
