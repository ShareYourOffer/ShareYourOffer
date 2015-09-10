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
        public IEnumerable<ChatHistory> GetMessages()
        {
            List<ChatHistory> messages = new List<ChatHistory>();
            StringBuilder result = new StringBuilder();
            DataTable dt = new DataTable();
            SqlConnection con = new SqlConnection("Data Source=MININT-164QQB5;Initial Catalog=Syo;Persist Security Info=True;User ID=sa;Password=pass@word1;");
            con.Open();
            string command = "select ch.MessageId,cd.ChatID ,up.UserName as SentByName ,ch.SentById ,ch.Message ,ch.SentOnTime from ChatDetails cd  join ChatHistory ch on ch.chatId=cd.ChatID join UserProfile up on up.UserId=ch.SentById where UserID1 in (1,2) or UserID2 in (1,2) order by SentOnTime";
            SqlCommand cmd = new SqlCommand(command, con);
            SqlDataReader dr = cmd.ExecuteReader();

            while (dr.Read())
            {
                messages.Add(new ChatHistory() { MessageID = Convert.ToInt32(dr["MessageId"].ToString()), ChatID = Convert.ToInt32(dr["ChatID"].ToString()), SentByName = dr["SentByName"].ToString(), SentById = Convert.ToInt32(dr["SentById"].ToString()), Message = dr["Message"].ToString(), SentOnTime = Convert.ToDateTime(dr["SentOnTime"].ToString()) });
            }
            return messages;
        }
    }
}