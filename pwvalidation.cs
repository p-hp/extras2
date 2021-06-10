using System;
using System.Linq;
using System.Numerics;
using System.Text;

namespace Recap
{
    class Program
    {
        static void Main(string[] args)
        {
            string input = Console.ReadLine();
            Validator(input);
        }

        static void Validator(string input)
        {
            bool length = CheckLength(input);
            bool consist = CheckContains(input);
            bool digits = CheckDigits(input);
            if (length && consist && digits)
            {
                Console.WriteLine("Password is valid");
            }
            else
            {
                if (!length)
                {
                    Console.WriteLine("Password must be between 6 and 10 characters");
                }
                if (!consist)
                {
                    Console.WriteLine("Password must consist only of letters and digits");
                }
                if(!digits)
                {
                    Console.WriteLine("Password must have at least 2 digits");
                }
            }
        }

        static bool CheckDigits(string input)
        {
            bool passes = true;
            int digits = 0;
            for (int i = 0; i < input.Length; i++)
            {
                if (char.IsDigit(input[i]))
                {
                    digits++;
                }
            }
            if (digits < 3)
            {
                passes = false;
            }
            return passes;
        }

        static bool CheckContains(string input)
        {
            bool itsRight = true;
            for (int i = 0; i < input.Length; i++)
            {
                if ((int)input[i] >= 0 && (int)input[i] <= 47 ||
                    (int)input[i] >= 58 && (int)input[i] <= 64 ||
                    (int)input[i] >= 91 && (int)input[i] <= 96 ||
                    (int)input[i] >= 123 && (int)input[i] <= 127)
                {
                   return itsRight = false;
                }
            }
            return itsRight;
        }

        static bool CheckLength(string input)
        {
            bool isGood = true;
            if (input.Length < 6 || input.Length > 10)
            {
                isGood = false;
            }
            return isGood;
        }
    }
}
