CREATE TABLE [dbo].[ChatDetails](
	[ChatID] [int] IDENTITY(1,1) NOT NULL,
	[UserID1] [int] NOT NULL,
	[UserID2] [int] NOT NULL,
 CONSTRAINT [PK_ChatDetails] PRIMARY KEY CLUSTERED 
(
	[ChatID] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]


CREATE TABLE [dbo].[ChatHistory](
	[MessageId] [int] IDENTITY(1,1) NOT NULL,
	[chatId] [int] NULL,
	[SentById] [int] NULL,
	[SentOnTime] [datetime] NULL,
	[Message] [nvarchar](max) NULL,
 CONSTRAINT [PK_ChatHistory] PRIMARY KEY CLUSTERED 
(
	[MessageId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]



CREATE TABLE [dbo].[UserProfile](
	[UserId] [int] IDENTITY(1,1) NOT NULL,
	[UserName] [varchar](50) NULL,
 CONSTRAINT [PK_UserProfile] PRIMARY KEY CLUSTERED 
(
	[UserId] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]




select * from ChatDetails
select * from ChatHistory
select * from UserProfile






--insert into ChatHistory values(1,1,getdate(),'Hi, i m Amrit')
--insert into ChatHistory values(1,2,getdate(),'Hello, I m Anubhav')
--insert into ChatHistory values(1,1,getdate(),'So, How are Things Going?')
--insert into ChatHistory values(1,2,getdate(),'Everything is going great :)')
--insert into ChatHistory values(1,1,getdate(),'Wow, Good to hear that :)')
--insert into ChatHistory values(1,2,getdate(),'haha')



--delete from ChatHistory









--insert into ChatDetails values(1,2)







--insert into UserProfile values('Amrit')
--insert into UserProfile values('Anubhav')
--insert into UserProfile values('Saurabh')