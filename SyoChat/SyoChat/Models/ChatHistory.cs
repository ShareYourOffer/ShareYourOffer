using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace SyoChat.Models
{
    public class ChatHistory
    {
        public int MessageID { get; set; }
        public int ChatID { get; set; }
        public int SentById { get; set; }
        public string SentByName { get; set; }
        public DateTime SentOnTime { get; set; }
        public string Message { get; set; }
    }
} 