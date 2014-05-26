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
import java.util.ArrayList;
import java.util.concurrent.Future;
import java.util.concurrent.TimeUnit;

/**
 *
 * @author Jay
 */
public class Seflab {

    /**
     * @param args the command line arguments
     * @throws java.lang.InterruptedException
     */
    public static void main(String[] args) throws InterruptedException, IOException {
        VM vm = new VM("C:\\Users\\Jay\\Documents\\Seflab\\TEST DATA\\seflab-example-sut.ova", "seflab-example-sut");

        vm.vmImport();
        vm.vmStart();
        TimeUnit.SECONDS.sleep(50);
        vm.vmStop();
        TimeUnit.SECONDS.sleep(10);
        vm.vmDelete();

    }
}
