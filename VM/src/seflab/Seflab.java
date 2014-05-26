/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package seflab;

import java.util.concurrent.TimeUnit;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author Jay
 * 
 */
public class Seflab {

    /**
     * 
     * @param args the command line arguments
     *
     */
    public static void main(String[] args) {
        VM vm = new VM("C:\\Users\\Jay\\Documents\\Seflab\\TEST DATA\\seflab-example-sut.ova", "seflab-example-sut");

        try {

            vm.vmImport();
            vm.vmStart();
            TimeUnit.SECONDS.sleep(50);
            vm.vmStop();
            TimeUnit.SECONDS.sleep(10);
            vm.vmDelete();
        } catch (InterruptedException ex) {
            Logger.getLogger(Seflab.class.getName()).log(Level.SEVERE, null, ex);
        }

    }
}
