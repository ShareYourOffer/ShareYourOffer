using SyoChat.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Net.Http;
using System.Web.Http;
using System.Data.SqlClient;
using System.Text;
using System.Data;

namespace SyoChat.Controllers
{
    public class ChatController : ApiController
    {
        [HttpGet]
        public IEnumerable<ChatHistory> GetMessages()
        {
            int chatid = 14;
            List<ChatHistory> messages = new List<ChatHistory>();
            StringBuilder result = new StringBuilder();
            DataTable dt = new DataTable();
            SqlConnection con = new SqlConnection("Data Source=MININT-164QQB5;Initial Catalog=Syo;Persist Security Info=True;User ID=sa;Password=pass@word1;");
            con.Open();
            string command = "select ch.MessageId,cd.ChatID ,up.UserName as SentByName ,ch.SentById ,ch.Message ,ch.SentOnTime from ChatDetails cd join ChatHistory ch on ch.chatId=cd.ChatID join UserProfile up on up.UserId=ch.SentById where ch.ChatID=" + chatid + " order by SentOnTime";
            SqlCommand cmd = new SqlCommand(command, con);
            SqlDataReader dr = cmd.ExecuteReader();

            while (dr.Read())
            {
                messages.Add(new ChatHistory() { MessageID = Convert.ToInt32(dr["MessageId"].ToString()), ChatID = Convert.ToInt32(dr["ChatID"].ToString()), SentByName = dr["SentByName"].ToString(), SentById = Convert.ToInt32(dr["SentById"].ToString()), Message = dr["Message"].ToString(), SentOnTime = Convert.ToDateTime(dr["SentOnTime"].ToString()) });
            }
            con.Close();
            return messages;
        }


        [HttpPost]

        //example query http://localhost:20314/api/Chat/AddNewChatDetails?sender=6&receiver=8&IsChatDetailsAvailable=false
        public void AddNewChatDetails(string sender, string receiver, bool IsChatDetailsAvailable)
        {
            SqlConnection con = new SqlConnection("Data Source=MININT-164QQB5;Initial Catalog=Syo;Persist Security Info=True;User ID=sa;Password=pass@word1;");
            con.Open();
            if (!IsChatDetailsAvailable)
            {
                string command = "Insert into ChatDetails values(" + sender + "," + receiver + ")";
                SqlCommand cmd = new SqlCommand(command, con);
                cmd.ExecuteNonQuery();
            }
            con.Close();
        }

        [HttpPost]

        //example query http://localhost:20314/api/Chat/InsertChatHistory?chatId=14&SentById=2&Message=Bahut%20Masti%20Ho%20Gayi%20ab%20Kam%20Kar%20le%20Nalayak
        public void InsertChatHistory(int chatId, int SentById, string Message)
        {
            SqlConnection con = new SqlConnection("Data Source=MININT-164QQB5;Initial Catalog=Syo;Persist Security Info=True;User ID=sa;Password=pass@word1;");
            con.Open();
            string command = "INSERT INTO ChatHistory VALUES (" + chatId + "," + SentById + ",'" + DateTime.Now + "','" + Message + "')";
            SqlCommand cmd = new SqlCommand(command, con);
            cmd.ExecuteNonQuery();
            con.Close();
        }

    }
}