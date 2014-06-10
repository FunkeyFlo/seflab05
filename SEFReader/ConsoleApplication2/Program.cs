using System;
using System.Collections.Generic;
using System.IO;
using System.IO.Ports;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;

namespace ConsoleApplication2
{
    class Program
    {
        static int seconds = 0;
        static string fileName = "";
        static int time = 0;

        public static void Main(String[] args)
        {
            try
            {
                seconds = Convert.ToInt32(args[1]);
                fileName = args[0];

                Console.WriteLine("file will be saved as: " + fileName + ".csv \n" +
                    "measurement will run for " + seconds + " seconds \n");

                string comPort = "COM5";
                var csv = new StringBuilder();

                var newLine = "time in ms, Electicity usage in Watt, Not Installed[2], Not Installed[3], ATX12V, 12V, 3.3V, 5Vsb, 5V";
                File.AppendAllText("C:\\" + fileName + ".csv", newLine.ToString() + Environment.NewLine);

                // COM poort wordt aangemaakt
                SerialPort mySerialPort = new SerialPort(comPort);

                mySerialPort.BaudRate = 50000;
                mySerialPort.Parity = Parity.None;
                mySerialPort.StopBits = StopBits.One;
                mySerialPort.DataBits = 8;
                mySerialPort.Handshake = Handshake.None;

                mySerialPort.Open();

                Console.WriteLine("Press any key to continue...");
                Console.WriteLine();

                // start commando voor het uitzenden van meetgegevens
                byte[] start = new byte[1] { 0x38 };
                mySerialPort.Write(start, 0, 1);

                mySerialPort.DataReceived += new SerialDataReceivedEventHandler(DataReceivedHandler);

                // aantal secondes dat de meting zal draaien
                Thread.Sleep(1000 * seconds);

                // stop commando voor het stoppen van uitzenden van meetgegevens
                byte[] stop = new byte[1] { 0x39 };
                mySerialPort.Write(stop, 0, 1);

                mySerialPort.Close();

                Console.ReadKey();
            }
            catch (Exception e)
            {
                Console.WriteLine("insufficient parameters");
                Console.ReadKey();
            }
        }

        // Print alle invoer uit die ontvangen wordt van het meetboard

        private static void DataReceivedHandler(
                            object sender,
                            SerialDataReceivedEventArgs e)
        {
            SerialPort sp = (SerialPort)sender;
            byte[] indata = new byte[700];
            string[] frame = new string[5];
            int frameCounter = 0;

            // leest data in Byte Array formaat in van het meetboard
            sp.Read(indata, 0, 699);


            for (int i = 0; i < 700; i += 2)
            {
                int data = (((indata[i] << 8) & 0xFF00) | ((indata[i + 1]) & 0xFF)) & 0xFFFF;

                if (data != 0 && data != 65535) {
                frameCounter++;

                    switch (frameCounter)
                    {
                        case 1:
                            frame[0] = (data * 0.00335).ToString().Replace(',', '.');
                            Console.WriteLine("ATX12V: " + frame[0]);
                            break;
                        case 2:
                            frame[1] = (data * 0.00322).ToString().Replace(',', '.');
                            Console.WriteLine("3.3V: \t" + frame[1]);
                            break;
                        case 3:
                            frame[2] = (data * 0.00806).ToString().Replace(',', '.');
                            Console.WriteLine("5V: \t" + frame[2]);
                            break;
                        case 4:
                            frame[3] = (data * 0.00322).ToString().Replace(',', '.');
                            Console.WriteLine("5Vsb: \t" + frame[3]);
                            break;
                        case 5:
                            frame[4] = (data * 0.00961).ToString().Replace(',', '.');
                            Console.WriteLine("12V: \t" + frame[4]);

                            string measurement = String.Empty;

                            foreach (string element in frame)
                            {
                                measurement += element + ",";
                            }

                            measurement = measurement.Remove(measurement.Length - 1);

                            File.AppendAllText("C:\\" + fileName + ".csv", time + ",0,0,0," + measurement + Environment.NewLine);
                            frameCounter = 0;
                            time += 100;
                            Console.Write("\n");
                            break;
                    }
                }
            }
        }
    }
}
