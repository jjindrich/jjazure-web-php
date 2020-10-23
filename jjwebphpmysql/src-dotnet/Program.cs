using System;
using System.Threading.Tasks;
using MySqlConnector;

namespace src_dotnet
{
    class Program
    {
        static async Task Main(string[] args)
        {
            Console.WriteLine("Connecting mySql...");
            string yourConnectionString = "Server=jjtestmysql.mysql.database.azure.com; Port=3306; Database=jj; Uid=jj@jjtestmysql; Pwd=Azure-12345; SslMode=Preferred;";

            for (int i = 1; i <= 10; i++)
                await Connect(yourConnectionString);
        }

        private async static Task Connect(string connstr)
        {
            using var connection = new MySqlConnection(connstr);

            DateTime time_start = DateTime.Now;
            await connection.OpenAsync();

            using var command = new MySqlCommand("SELECT * FROM Products;", connection);
            using var reader = await command.ExecuteReaderAsync();
            while (await reader.ReadAsync())
            {
                var value = reader.GetValue(0);                
            }
            DateTime time_end = DateTime.Now;
            var time = time_end - time_start;
            Console.WriteLine("Executed in {0}", time);
        }
    }
}
