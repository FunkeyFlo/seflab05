package serversystem;

import java.io.File;
import java.util.logging.Level;
import java.util.logging.Logger;

import org.apache.ftpserver.FtpServer;
import org.apache.ftpserver.FtpServerFactory;
import org.apache.ftpserver.ftplet.*;
import org.apache.ftpserver.listener.ListenerFactory;
import org.apache.ftpserver.usermanager.*;
import org.apache.log4j.PropertyConfigurator;

/*
 * @author <a href="http://mina.apache.org">Apache MINA Project</a>
 */
@SuppressWarnings("unused")
public class FtpServerActivity implements Runnable {

    public void run() {

        PropertyConfigurator.configure("log4j.properties");

        FtpServerFactory serverFactory = new FtpServerFactory();
        ListenerFactory factory = new ListenerFactory();

        // set the port of the listener
        factory.setPort(5678);
        
        serverFactory.addListener("default", factory.createListener());

        System.out.println("Adding Users Now");
        PropertiesUserManagerFactory userManagerFactory = new PropertiesUserManagerFactory();
        userManagerFactory.setFile(new File("users.properties"));

        userManagerFactory.setPasswordEncryptor(new SaltedPasswordEncryptor());
        UserManager userManagement = userManagerFactory.createUserManager();
//		UserFactory userFact = new UserFactory();
//		userFact.setName("flo");
//		userFact.setPassword("flo");
//		userFact.setHomeDirectory("F:/ftp");
//		User user = userFact.createUser();
//		userManagement.save(user);

        serverFactory.setUserManager(userManagement);
        serverFactory.setUserManager(userManagerFactory.createUserManager());

        // start the server
        FtpServer server = serverFactory.createServer();

        System.out.println("Server Starting" + factory.getPort());
        try {
            server.start();
        } catch (FtpException ex) {
            Logger.getLogger(FtpServerActivity.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
