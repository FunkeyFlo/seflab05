/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

package serversystem;

import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStream;
import java.util.Properties;

/**
 *
 * @author Florentijn
 */
public class Config {
    
    public String getVariable(String varName){
        Properties prop = new Properties();
        InputStream input = null;
        String value = "";

        try {

            input = new FileInputStream("C:/SEFLab/config.properties");

            // load a properties file
            prop.load(input);

            // get the property value and print it out
            value = prop.getProperty("path1");

        } catch (IOException ex) {
            ex.printStackTrace();
        } finally {
            if (input != null) {
                try {
                    input.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }
            return value;
        }
        
    }
    
}
