using System;
using System.Runtime.InteropServices;
using System.Windows.Forms;
using Microsoft.Win32;

namespace ProxySwitcher
{
    public class Form1 : Form
    {
        [DllImport("wininet.dll", SetLastError = true)]
        private static extern bool InternetSetOption(IntPtr hInternet, int dwOption, IntPtr lpBuffer, int dwBufferLength);

        private const int INTERNET_OPTION_SETTINGS_CHANGED = 39;
        private const int INTERNET_OPTION_REFRESH = 37;

        private Label currentProxy;
        private Button TopMost;

        // Proxy Lists
        private const string PROXY_A = "127.0.0.1:9090";
        private const string PROXY_B = "127.0.0.1:9091";

        public Form1()
        {
            Text = "Proxy Switcher";
            Width = 300;
            Height = 200;

            TopMost = false
        }
    }
    class Program
    {
        static async Task Main(string[] args)
    }
}