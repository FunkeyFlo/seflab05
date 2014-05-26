package meetresultaten;

import java.net.HttpURLConnection;
import java.net.URL;
import java.io.*;
import static java.lang.System.*;
import java.text.DecimalFormat;

public class Meetresultaten {

    public static void main(String[] args) {
        long startTime = System.currentTimeMillis();
        DecimalFormat DF2 = new DecimalFormat("0.000");
        double responsevalue1 = 0.0;
        double responsevalue2 = 0.0;
        boolean running = true;
        URL url;
        String[] URL = {"http://localhost:5331/1",
                        "http://localhost:5331/2" };


        try {


            FileWriter wattwriter = new FileWriter("C:\\Users\\seflab05\\Desktop\\R\\Watt.csv");
            PrintWriter printwatt = new PrintWriter(wattwriter);
            printwatt.println("time in ms, Electricity usage in Watts,");

            while (running) {

                for (int k = 0; k < 2; k++) {
                    try {
                        url = new URL(URL[k]);
                        HttpURLConnection connection = (HttpURLConnection) url.openConnection();
                        BufferedReader in = new BufferedReader(new InputStreamReader(connection.getInputStream()));
                        String response = in.readLine();
                        response = response.replaceAll("[^\\d.]", "");


                        if (k == 1) {

                            double responsenumber = Integer.parseInt(response);
                            responsevalue1 = responsenumber * 0.00322;

                        } else {
                            double responsenumber = Integer.parseInt(response);
                            responsevalue2 = responsenumber * 0.00961;

                        }

                        Thread.sleep(50);

                    } catch (Exception e) {
                        e.printStackTrace();
                    }


                }
                double watt = responsevalue1 * responsevalue2;
                String formatted = DF2.format(watt);
                long duration = System.currentTimeMillis() - startTime;
                printwatt.println(duration + ", " + formatted + ",");
//                printwatt.print(formatted);
//
//                printwatt.println(",");
            }

            printwatt.close();

        } catch (IOException e) {
            out.println("ERROR!");
        }
    }
}
