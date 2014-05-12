/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sudoku;

import java.util.Scanner;

/**
 *
 * @author Florentijn
 */
public class Sudoku {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        showNumbers(222, 112);
        Scanner scan = new Scanner(System.in);
        System.out.println("");
        System.out.println("please enter a line of text");
        scrambler(scan.nextLine(), 'e');
    }

    public static void showNumbers(int beginNumber, int endNumber) {
        if (beginNumber > endNumber) {
            System.out.println("invalid numeric");
        } else {
            for (int i = beginNumber; i <= endNumber; i++) {
                System.out.println(i);
            }
        }
    }
    
    public static void scrambler(String s, char c) {
        String newString = "" ;
        Scanner scan = new Scanner(System.in);
        
        System.out.println("please enter a char");
        newString = s.replace(c, scan.next().charAt(0));
        System.out.println(newString);
    }
}
